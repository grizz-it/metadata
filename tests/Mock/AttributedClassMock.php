<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Tests\Mock;

use GrizzIt\Metadata\Tests\Mock\AttributeMock;

#[AttributeMock('class', 'foo')]
class AttributedClassMock
{
    #[AttributeMock('property', 'bar')]
    public string $foo = '';

    #[AttributeMock('constant', 'baz')]
    public const FOO_CONSTANT = 'foo';

    /**
     * Test method
     *
     * @return string
     */
    #[AttributeMock('method', 'qux')]
    public function test(
        #[AttributeMock('parameter', 'foo')] string $foo = 'foo'
    ): string {
        $this->foo = $foo;

        return $foo;
    }
}
