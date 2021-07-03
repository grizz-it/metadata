<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Registry;

class DecoratedRegistry
{
    /**
     * Contains the registered targets.
     *
     * @var array
     */
    private static array $targets = [];

    /**
     * Register a new target to the registry.
     *
     * @param object|callable|string ...$target
     *
     * @return void
     */
    public static function registerTarget(
        string ...$target
    ): void {
        static::$targets = array_merge(
            static::$targets,
            array_fill_keys($target, [])
        );
    }

    /**
     * Retrieves the registered targets.
     *
     * @return array
     */
    public static function getTargets(): array
    {
        return array_keys(static::$targets);
    }
}
