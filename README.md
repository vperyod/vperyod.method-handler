# vperyod.method-handler
Method override handler

[![Latest version][ico-version]][link-packagist]
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]

## Installation
```
composer require vperyod/method-handler
```

## Usage
```php
// Create handler with Auth and ResumeService instance
$handler = new Vperyod\MethodHandler\MethodHandler();

// Add to your middleware stack, radar, relay, etc.
$stack->middleware($handler);

// In your views generating forms, you can use the Helper to generate an
// appropriate hidden input.
$helper = new Vperyod\MethodHandler\MethodOverrideHelper;

echo $helper('PUT');
// <input type="hidden" name="__method_overide" value="PUT" />

```

[ico-version]: https://img.shields.io/packagist/v/vperyod/method-handler.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/vperyod/vperyod.method-handler/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/vperyod/vperyod.method-handler.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/vperyod/vperyod.method-handler.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/vperyod/method-handler
[link-travis]: https://travis-ci.org/vperyod/vperyod.method-handler
[link-scrutinizer]: https://scrutinizer-ci.com/g/vperyod/vperyod.method-handler
[link-code-quality]: https://scrutinizer-ci.com/g/vperyod/vperyod.method-handler
