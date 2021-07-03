<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Tests\Component\Compiler;

use Attribute;
use PHPUnit\Framework\TestCase;
use GrizzIt\Metadata\Tests\Mock\AttributeMock;
use GrizzIt\Metadata\Tests\Mock\AttributedClassMock;
use GrizzIt\Metadata\Component\Registry\ClassRegistry;
use GrizzIt\Metadata\Component\Compiler\AttributeCompiler;

/**
 * @coversDefaultClass \GrizzIt\Metadata\Component\Compiler\AttributeCompiler
 */
class AttributeCompilerTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::__construct
     * @covers ::compile
     *
     * @runInSeparateProcess
     */
    public function testComponent(): void
    {
        $subject = new AttributeCompiler();
        ClassRegistry::registerClass(AttributeMock::class);
        ClassRegistry::registerClass(AttributedClassMock::class);
        $result = $subject->compile();

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
