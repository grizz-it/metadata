<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Component\Compiler;

use GrizzIt\Metadata\Common\AttributeReaderInterface;
use GrizzIt\Metadata\Component\Reader\AttributeReader;
use GrizzIt\Metadata\Component\Registry\ClassRegistry;
use GrizzIt\Metadata\Common\AttributeCompilerInterface;

class AttributeCompiler implements AttributeCompilerInterface
{
    /**
     * Contains the attribute reader.
     *
     * @var AttributeReaderInterface $attributeReader
     */
    private AttributeReaderInterface $attributeReader;

    /**
     * Constructor.
     *
     * @param AttributeReaderInterface $attributeReader
     */
    public function __construct(
        AttributeReaderInterface $attributeReader = null
    ) {
        $this->attributeReader = $attributeReader ??
            new AttributeReader();
    }

    /**
     * Combines the registered classes and reads the attributes.
     *
     * @return array
     */
    public function compile(): array
    {
        $classes = [];
        foreach (ClassRegistry::getClasses() as $class) {
            $classes[$class] = $this->attributeReader->read($class);
        }

        return $classes;
    }
}
