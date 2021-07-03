<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Tests\Mock;

use Attribute;

#[Attribute]
class AttributeMock
{
    /** @var string */
    private string $attribute;

    /** @var string */
    private string $value;

    /**
     * Constructor.
     *
     * @param string $attribute
     * @param string $value
     */
    public function __construct(string $attribute, string $value)
    {
        $this->attribute = $attribute;
        $this->value = $value;
    }

    /**
     * Convert value to string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->attribute . '.' . $this->value;
    }
}
