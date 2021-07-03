<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Component\Registry;

class ClassRegistry
{
    /**
     * Contains the registered classes.
     *
     * @var array
     */
    private static array $classes = [];

    /**
     * Register a new class to the registry.
     *
     * @param string ...$class
     *
     * @return void
     */
    public static function registerClass(string ...$class): void
    {
        static::$classes = array_merge(
            static::$classes,
            array_fill_keys($class, [])
        );
    }

    /**
     * Retrieves the registered classes.
     *
     * @return array
     */
    public static function getClasses(): array
    {
        return array_keys(static::$classes);
    }
}
