<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Common;

interface AttributeCompilerInterface
{
    /**
     * Combines the registered classes and reads the attributes.
     *
     * @return array
     */
    public function compile(): array;
}
