<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Component\Reader;

use ReflectionClass;
use GrizzIt\Metadata\Common\AttributeReaderInterface;

class AttributeReader implements AttributeReaderInterface
{
    /**
     * Reads the attributes and returns its instances.
     *
     * @param string $class
     *
     * @return array
     */
    public function read(string $class): array
    {
        $attributes = [];
        if (class_exists($class)) {
            $reflection = new ReflectionClass($class);
            foreach ($reflection->getAttributes() as $attribute) {
                $attributes[] = $attribute->newInstance();
            }
        }

        return $attributes;
    }
}
