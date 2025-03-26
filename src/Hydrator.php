<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http;

use Exception;
use Jaddek\Fireblocks\Http\Response\CollectionInterface;
use Jaddek\Fireblocks\Http\Response\ItemInterface;
use ReflectionClass;
use ReflectionNamedType;

final class Hydrator
{
    public array $levels = [];

    public static function instance(array $data, string $class): ItemInterface|CollectionInterface
    {
        $reflection = new ReflectionClass($class);

        $instance = new static;
        $instance->associate($reflection);

        $result = $instance->hydrate($data, $reflection);

        if (!$result instanceof $class) {
            throw new Exception('Hydration failed');
        }

        return $result;
    }

    private function hydrate(array $data, ReflectionClass $reflection): ItemInterface|CollectionInterface
    {
        $class = $reflection->getName();

        return match ($this->matchSubclass($reflection)) {
            CollectionInterface::class => $this->hydrateCollection($data, $class),
            ItemInterface::class => $this->hydrateItem($data, $class),
            default => throw new Exception('Unexpected subclass'),
        };
    }

    private function hydrateCollectionItems(CollectionInterface $collection, $data): void
    {
        foreach ($data as $item_data) {
            $item = $this->hydrateItem($item_data, $collection::getSupportedItem());
            $collection->add($item);
        }
    }

    private function hydrateCollection(array $data, string $class): CollectionInterface
    {
        /** @var  CollectionInterface $collection */
        $collection = new $class();
        foreach ($data as $key => $array) {
            if (is_array($data) && isset($this->levels[$key])) {
                if ($data['nextUrl']) {
                    $collection->setNextUrl($data['nextUrl']);
                }
                if ($data['previousUrl']) {
                    $collection->setPreviousUrl($data['previousUrl']);
                }
                if ($data['paging']) { // paging is always an array
                    $collection->setPaging($data['paging']);
                }
                $this->hydrateCollectionItems($collection, $array, $this->levels[$key]);
            }
        }
        return $collection;
    }

    private function hydrateItem(array $data, string $class): ItemInterface
    {
        foreach ($data as $key => &$value) {
            if (is_array($value) && isset($this->levels[$key])) {
                $collection = new $this->levels[$key]();
                assert($collection instanceof CollectionInterface);
                $this->hydrateCollectionItems($collection, $value);
                $value = $collection;
            }
        }

        $newArray   = [];
        $reflection = new ReflectionClass($class);

        foreach ($reflection->getConstructor()->getParameters() as $parameter) {
            $parameterValue = $data[$parameter->getName()] ?? null;

            if ($parameterValue === null) {
                $newArray[$parameter->getName()] = $parameterValue;

                continue;
            }

            //@TODO: ReflectionUnionTypes
            if (!$parameter->getType()->isBuiltin() && !$parameterValue instanceof CollectionInterface) {
                $newArray[$parameter->getName()] = $this->hydrateItem($parameterValue, $parameter->getType()->getName());

                continue;
            }

            $valueType  = $this->getType($parameterValue);
            $paramType  = $parameter->getType()->getName();
            $isNullable = $parameter->getType()->allowsNull();

            if (($valueType === 'NULL' && !$isNullable) && ($valueType !== $paramType)) {
                throw new Exception(sprintf('Different types. An attribute <%s> expecting %s, got %s',
                    $parameter->getName(),
                    $parameter->getType()->getName(),
                    $this->getType($parameterValue)
                ));
            }
            $newArray[$parameter->getName()] = $parameterValue;
        }

        return new $class(...array_values($newArray));
    }

    private function matchSubclass(ReflectionClass $reflection): string
    {
        return match (true) {
            $reflection->isSubclassOf(CollectionInterface::class) => CollectionInterface::class,
            $reflection->isSubclassOf(ItemInterface::class) => ItemInterface::class,
            default => throw new Exception(sprintf('Unexpected %s subclass', $reflection->getName())),
        };
    }

    private function associate(ReflectionClass $reflection): self
    {
        match ($this->matchSubclass($reflection)) {
            CollectionInterface::class => $this->associateCollection($reflection),
            ItemInterface::class => $this->associateItem($reflection),
            default => throw new Exception('Unexpected subclass'),
        };

        return $this;
    }


    private function associateCollection(ReflectionClass $reflection): void
    {
        /** @var CollectionInterface $class */
        $class         = $reflection->getName();
        $supportedItem = $class::getSupportedItem();
        $itemKey       = $class::getItemsKey();

        $this->levels[$itemKey] = $class;

        $this->associate(new ReflectionClass($supportedItem));
    }

    private function associateItem(ReflectionClass $reflection)
    {
        foreach ($reflection->getProperties() as $property) {
            $type = $property->getType();

            //@TODO: ReflectionUnionTypes

            if ($type instanceof ReflectionNamedType && $type->isBuiltin() === false) {
                $item = $type->getName();

                $this->associate(new ReflectionClass($item));
            }
        }
    }

    private function getType(mixed $value): string
    {
        $type = gettype($value);

        return match ($type) {
            'double' => 'float',
            'integer' => 'int',
            default => $type,
        };
    }
}
