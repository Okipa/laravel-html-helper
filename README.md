# Laravel Html Helper

[![Source Code](https://img.shields.io/badge/source-okipa/laravel--html--helper-blue.svg)](https://github.com/Okipa/laravel-html-helper)
[![Latest Version](https://img.shields.io/github/release/okipa/laravel-html-helper.svg?style=flat-square)](https://github.com/Okipa/laravel-html-helper/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/okipa/laravel-html-helper.svg?style=flat-square)](https://packagist.org/packages/okipa/laravel-html-helper)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![Build status](https://github.com/Okipa/laravel-html-helper/workflows/CI/badge.svg)](https://github.com/Okipa/laravel-html-helper/actions)
[![Coverage Status](https://coveralls.io/repos/github/Okipa/laravel-html-helper/badge.svg?branch=master)](https://coveralls.io/github/Okipa/laravel-html-helper?branch=master)
[![Quality Score](https://img.shields.io/scrutinizer/g/Okipa/laravel-html-helper.svg?style=flat-square)](https://scrutinizer-ci.com/g/Okipa/laravel-html-helper/?branch=master)

Useful helpers to dynamically generate clean HTML with Laravel.

## Compatibility

| Laravel | PHP | Package |
|---|---|---|
| ^5.8 | ^7.2 | ^1.3 |
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
composer require "okipa/laravel-html-helper:^1.3"
```

## API

### `classTag(...$classList) : HtmlString`

In you view :

```blade
<div{{ classTag(
    'class1',
    ['class2', 'class3', null],
    null,
    [],
    ['class4', ['class5 ', 'class6Key' => 'class6']],
    7
) }}></div>
```

Will produce :

```html
<div class="class1 class2 class3 class4 class5 class6 7"></div>
```

In your code, you can do exactly the same using the `(new Okipa\LaravelHtmlHelper\HtmlClassTag)->render()` method.

### `htmlAttributes(...$attributesList) : HtmlString`

In you view : 

```blade
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
```

Will produce :

```html
<div attribute1Value attribute2Key="attribute2Value" attribute3Key attribute4Value attribute5Value attribute6Value attributes7Value attribute8Value attribute9Key="attribute9Value" attribute10Key attribute11Value attribute12Key></div>
```

In your code, you can do exactly the same using the `(new Okipa\LaravelHtmlHelper\HtmlAttributes)->render()` method.

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
