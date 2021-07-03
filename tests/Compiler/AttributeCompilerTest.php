<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Tests\Compiler;

use Attribute;
use PHPUnit\Framework\TestCase;
use GrizzIt\Metadata\Tests\Mock\AttributeMock;
use GrizzIt\Metadata\Tests\Mock\AttributedClassMock;
use GrizzIt\Metadata\Registry\DecoratedRegistry;
use GrizzIt\Metadata\Compiler\AttributeCompiler;

/**
 * @coversDefaultClass \GrizzIt\Metadata\Compiler\AttributeCompiler
 */
class AttributeCompilerTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::compile
     *
     * @runInSeparateProcess
     */
    public function testCompiler(): void
    {
        DecoratedRegistry::registerTarget(AttributeMock::class);
        DecoratedRegistry::registerTarget(AttributedClassMock::class);
        $result = AttributeCompiler::compile();

        $this->assertInstanceOf(
            Attribute::class,
            $result[AttributeMock::class]['class'][0]
        );

        $this->assertInstanceOf(
            AttributeMock::class,
            $result[AttributedClassMock::class]['class'][0]
        );
    }
}
