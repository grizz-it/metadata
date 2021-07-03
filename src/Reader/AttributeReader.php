<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Reader;

use ReflectionClass;
use ReflectionFunction;

class AttributeReader
{
    /**
     * Contains the previously analyzed string targets.
     */
    private static array $analyzed = [];

    /**
     * Reads the attributes and returns its instances.
     *
     * @param object|callable|string $target
     *
     * @return array
     */
    public static function read(object | callable | string $target): array
    {
        $result = [];
        $isString = is_string($target);
        if ($isString && isset(static::$analyzed[$target])) {
            return static::$analyzed[$target];
        }

        if (is_callable($target) || ($isString && function_exists($target))) {
            $result = static::analyzeFunction($target);
        } elseif (is_object($target) || ($isString && class_exists($target))) {
            $result = static::analyzeClass($target);
        }

        if ($isString) {
            static::$analyzed[$target] = $result;
        }

        return $result;
    }

    /**
     * Analyzes a function and returns the attributes.
     *
     * @param mixed $function
     *
     * @return array
     */
    private static function analyzeFunction(callable | string $function): array
    {
        $return = [];
        $reflection = new ReflectionFunction($function);
        foreach ($reflection->getAttributes() as $attribute) {
            $return['function'][] = $attribute->newInstance();
        }

        foreach ($reflection->getParameters() as $parameter) {
            $parameterName = $parameter->getName();
            foreach ($parameter->getAttributes() as $attribute) {
                $return['parameters'][$parameterName][] = $attribute
                    ->newInstance();
            }
        }

        return $return;
    }

    /**
     * Analyzes a class and returns the attributes.
     *
     * @param object|string $class
     *
     * @return array
     */
    private static function analyzeClass(object | string $class): array
    {
        $return = [];
        $reflection = new ReflectionClass($class);
        foreach ($reflection->getAttributes() as $attribute) {
            $return['class'][] = $attribute->newInstance();
        }

        foreach ($reflection->getMethods() as $method) {
            $methodName = $method->getName();
            foreach ($method->getAttributes() as $attribute) {
                $return['methods'][$methodName]['method'][] = $attribute
                    ->newInstance();
            }

            foreach ($method->getParameters() as $parameter) {
                $parameterName = $parameter->getName();
                foreach ($parameter->getAttributes() as $attribute) {
                    $return['methods'][$methodName]['parameters'][
                        $parameterName
                    ][] = $attribute->newInstance();
                }
            }
        }

        foreach ($reflection->getProperties() as $property) {
            foreach ($property->getAttributes() as $attribute) {
                $return['properties'][
                    $property->getName()
                ][] = $attribute->newInstance();
            }
        }

        foreach ($reflection->getReflectionConstants() as $constant) {
            foreach ($constant->getAttributes() as $attribute) {
                $return['constants'][
                    $constant->getName()
                ][] = $attribute->newInstance();
            }
        }

        return $return;
    }
}
