<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Metadata\Tests\Reader;

use PHPUnit\Framework\TestCase;
use GrizzIt\Metadata\Tests\Mock\AttributedClassMock;
use GrizzIt\Metadata\Reader\AttributeReader;

/**
 * @coversDefaultClass \GrizzIt\Metadata\Reader\AttributeReader
 */
class AttributeReaderTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::read
     * @covers ::analyzeClass
     *
     * @runInSeparateProcess
     */
    public function testAnalyzeClass(): void
    {
        $result = AttributeReader::read(AttributedClassMock::class);
        $this->assertEquals(
            'class.foo',
            (string) $result['class'][0]
        );

        $this->assertEquals(
            'method.qux',
            (string) $result['methods']['test']['method'][0]
        );

        $this->assertEquals(
            'parameter.foo',
            (string) $result['methods']['test']['parameters']['foo'][0]
        );

        $this->assertEquals(
            'property.bar',
            (string) $result['properties']['foo'][0]
        );

        $this->assertEquals(
            'constant.baz',
            (string) $result['constants']['FOO_CONSTANT'][0]
        );


        $this->assertEquals(
            $result,
            AttributeReader::read(AttributedClassMock::class)
        );
    }

    /**
     * @return void
     *
     * @covers ::read
     * @covers ::analyzeFunction
     *
     * @runInSeparateProcess
     */
    public function testAnalyzeFunction(): void
    {
        $result = AttributeReader::read('testAttributeAnalysis');
        $this->assertEquals(
            'function.foo',
            (string) $result['function'][0]
        );

        $this->assertEquals(
            'parameter.bar',
            (string) $result['parameters']['foo'][0]
        );
    }
}
