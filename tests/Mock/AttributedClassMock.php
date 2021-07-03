<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Tests\Mock;

use GrizzIt\Metadata\Tests\Mock\AttributeMock;

#[AttributeMock('foo', 'bar')]
class AttributedClassMock
{
    /**
     * Test method
     *
     * @return string
     */
    #[AttributeMock('baz', 'qux')]
    public function test(): string
    {
        return 'foo';
    }
}
