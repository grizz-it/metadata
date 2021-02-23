<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Common;

interface AttributeReaderInterface
{
    /**
     * Reads the attributes and returns its instances.
     *
     * @param string $class
     *
     * @return array
     */
    public function read(string $class): array;
}
