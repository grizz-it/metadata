<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Compiler;

use GrizzIt\Metadata\Reader\AttributeReader;
use GrizzIt\Metadata\Registry\DecoratedRegistry;

class AttributeCompiler
{
    /**
     * Combines the registered classes and reads the attributes.
     *
     * @return array
     */
    public static function compile(): array
    {
        $targets = [];
        foreach (DecoratedRegistry::getTargets() as $target) {
            $targets[$target] = AttributeReader::read($target);
        }

        return $targets;
    }
}
