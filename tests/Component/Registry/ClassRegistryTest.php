<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Tests\Component\Registry;

use PHPUnit\Framework\TestCase;
use GrizzIt\Metadata\Tests\Mock\AttributeMock;
use GrizzIt\Metadata\Tests\Mock\AttributedClassMock;
use GrizzIt\Metadata\Component\Registry\ClassRegistry;

/**
 * @coversDefaultClass \GrizzIt\Metadata\Component\Registry\ClassRegistry
 */
class ClassRegistryTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::registerClass
     * @covers ::getClasses
     *
     * @runInSeparateProcess
     */
    public function testComponent(): void
    {
        $this->assertEquals([], ClassRegistry::getClasses());
        ClassRegistry::registerClass(AttributeMock::class);
        ClassRegistry::registerClass(
            AttributedClassMock::class,
            AttributeMock::class
        );

        $this->assertEquals(
            [AttributeMock::class, AttributedClassMock::class],
            ClassRegistry::getClasses()
        );
    }
}
