<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Tests\Component\Reader;

use PHPUnit\Framework\TestCase;
use GrizzIt\Metadata\Tests\Mock\AttributeMock;
use GrizzIt\Metadata\Tests\Mock\AttributedClassMock;
use GrizzIt\Metadata\Component\Reader\AttributeReader;

/**
 * @coversDefaultClass \GrizzIt\Metadata\Component\Reader\AttributeReader
 */
class AttributeReaderTest extends TestCase
{
    /**
     * @return void
     */
    public function testComponent(): void
    {
        $subject = new AttributeReader();

        $result = $subject->read(AttributedClassMock::class);
        $this->assertInstanceOf(
            AttributeMock::class,
            $result['class'][0]
        );

        $this->assertInstanceOf(
            AttributeMock::class,
            $result['methods']['test'][0]
        );
    }
}
