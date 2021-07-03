[![Build Status](https://travis-ci.com/grizz-it/metadata.svg?branch=master)](https://travis-ci.com/grizz-it/metadata)

# GrizzIT Metadata

This package offers a standard for reading the new PHP 8 attributes.

## Installation

To install the package run the following command:

```
composer require grizz-it/metadata
```

## Usage

Classes or functions that use [attributes](https://www.php.net/manual/en/language.attributes.php)
will need to be registered in the [DecoratedRegistry](src/Registry/DecoratedRegistry.php)
on the `registerTarget` method. This can be done with an autoloading file in a
package with the following contents:
```php
<?php

use GrizzIt\Metadata\Registry\DecoratedRegistry;

DecoratedRegistry::registerTarget(MyAttributedClass::class);
```

This will include it in the list of registered targets.
When the compiler is asked to compile the attributes, it will be automatically
picked up.

To retrieve all classes and functions and their attributes, the following snippet can be used:

```php
<?php

use GrizzIt\Metadata\Compiler\AttributeCompiler;

var_dump(AttributeCompiler::compile());

```

This will create an instance of each attribute for each class and function in an
associative array.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## MIT License

Copyright (c) GrizzIT

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
