<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Tests\Registry;

use PHPUnit\Framework\TestCase;
use GrizzIt\Metadata\Registry\DecoratedRegistry;
use GrizzIt\Metadata\Tests\Mock\AttributeMock;
use GrizzIt\Metadata\Tests\Mock\AttributedClassMock;

/**
 * @coversDefaultClass \GrizzIt\Metadata\Registry\DecoratedRegistry
 */
class DecoratedRegistryTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::registerTarget
     * @covers ::getTargets
     *
     * @runInSeparateProcess
     */
    public function testRegistry(): void
    {
        $this->assertEquals([], DecoratedRegistry::getTargets());
        DecoratedRegistry::registerTarget(AttributeMock::class);
        DecoratedRegistry::registerTarget(
            AttributedClassMock::class,
            AttributeMock::class
        );

        $this->assertEquals(
            [AttributeMock::class, AttributedClassMock::class],
            DecoratedRegistry::getTargets()
        );
    }
}
