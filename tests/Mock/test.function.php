<?php

use GrizzIt\Metadata\Tests\Mock\AttributeMock;

#[AttributeMock('function', 'foo')]
function testAttributeAnalysis(
    #[AttributeMock('parameter', 'bar')] string $foo = 'foo'
): string {
    return $foo;
}
