# Laravel Html Helper

[![Source Code](https://img.shields.io/badge/source-okipa/laravel--html--helper-blue.svg)](https://github.com/Okipa/laravel-html-helper)
[![Latest Version](https://img.shields.io/github/release/okipa/laravel-html-helper.svg?style=flat-square)](https://github.com/Okipa/laravel-html-helper/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/okipa/laravel-html-helper.svg?style=flat-square)](https://packagist.org/packages/okipa/laravel-html-helper)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![Build Status](https://scrutinizer-ci.com/g/Okipa/laravel-html-helper/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Okipa/laravel-html-helper/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/Okipa/laravel-html-helper/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Okipa/laravel-html-helper/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Okipa/laravel-html-helper/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Okipa/laravel-html-helper/?branch=master)

Usefull helpers to dynamically generate clean HTML with Laravel.

## Compatibility

| Laravel version | PHP version | Package version |
|---|---|---|
| ^5.5 | ^7.2 | ^1.2 |
| ^5.5 | ^7.1 | ^1.0 |

## Table of Contents
- [Installation](#installation)
- [API](#api)
  - [classTag](#classtag)
  - [htmlAttributes](#htmlattributes)
- [Testing](#testing)
- [Changelog](#changelog)
- [Contributing](#contributing)
- [Credits](#credits)
- [Licence](#license)

## Installation

- Install the package with composer :
```bash
composer require "okipa/laravel-html-helper:^2.0"
```

## API

### `classTag(...$classList) : HtmlString`
Render a html class tag filled with the given class list .  

```php
// in your html
<div{{ classTag(
    'class1',
    ['class2', 'class3', null],
    null,
    [],
    ['class4', ['class5 ', 'class6Key' => 'class6']],
    7
) }}></div>
// gives
<div class="class="class1 class2 class3 class4 class5 class6 7"></div>
```

```
// in your code
public function someMethod()
{
    return (string) '<div' . app(\Okipa\LaravelHtmlHelper\HtmlClassTag::class)->render(
        ['imported', 'class', 'array', 'from' 'config'],
        ['nested', ['class', 'arrays']],
        'another-class'
    ) . '></div>'
}
// gives
<div class="imported class array from config nested class arrays another-class"></div>
```

### `htmlAttributes(...$attributesList) : HtmlString`
Render html attributes from the given attributes list.  
Note : 

```php
// in your html
<div{{ htmlAttributes(
    'attribute1Value',
    ['attribute2Key' => 'attribute2Value'],
    ['attribute3Key' => null],
    ['attribute4Value', 'attribute5Value'],
    '',
    null,
    ['' => 'attribute6Value'],
    ['attributes7Value', ['attribute8Value', 'attribute9Key' => 'attribute9Value']],
    ['attribute10Key' => ['attribute11Value']],
    ['attribute12Key' => '']
) }}></div>
// gives
<div attribute1Value attribute2Key="attribute2Value" attribute3Key attribute4Value attribute5Value attribute6Value attributes7Value attribute8Value attribute9Key="attribute9Value" attribute10Key attribute11Value attribute12Key></div>
```

```
// in your code
public function someMethod()
{
    return (string) '<div' . app(\Okipa\LaravelHtmlHelper\HtmlAttributes::class)->render(
        'attribute1Value',
        ['attribute2Key' => 'attribute2Value'],
        ['attribute3Key' => null],
        ['attribute4Value', 'attribute5Value'],
        '',
        null,
        ['' => 'attribute6Value'],
        ['attributes7Value', ['attribute8Value', 'attribute9Key' => 'attribute9Value']],
        ['attribute10Key' => ['attribute11Value']],
        ['attribute12Key' => '']
    ) . '></div>'
}
// gives
<div attribute1Value attribute2Key="attribute2Value" attribute3Key attribute4Value attribute5Value attribute6Value attributes7Value attribute8Value attribute9Key="attribute9Value" attribute10Key attribute11Value attribute12Key></div>
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Arthur LORENT](https://github.com/okipa)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
