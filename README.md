# Laravel Html Helper

[![Source Code](https://img.shields.io/badge/source-okipa/laravel--html--helper-blue.svg)](https://github.com/Okipa/laravel-html-helper)
[![Latest Version](https://img.shields.io/github/release/okipa/laravel-html-helper.svg?style=flat-square)](https://github.com/Okipa/laravel-html-helper/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/okipa/laravel-html-helper.svg?style=flat-square)](https://packagist.org/packages/okipa/laravel-html-helper)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![Build status](https://github.com/Okipa/laravel-html-helper/workflows/CI/badge.svg)](https://github.com/Okipa/laravel-html-helper/actions)
[![Coverage Status](https://coveralls.io/repos/github/Okipa/laravel-html-helper/badge.svg?branch=master)](https://coveralls.io/github/Okipa/laravel-html-helper?branch=master)


Useful helpers to dynamically generate clean HTML with Laravel.

## Compatibility

| Laravel | PHP | Package |
|---|---|---|
| ^7.* | ^7.4 | ^2.0 |
| ^7.* | ^7.4 | ^1.4 |
| ^5.8 | ^7.2 | ^1.3 |
| ^5.5 | ^7.2 | ^1.2 |
| ^5.5 | ^7.1 | ^1.0 |

## Upgrade guide

* [From v1 to V2](/docs/upgrade-guides/from-v1-to-v2.md)

## Table of Contents

- [Installation](#installation)
- [API](#api)
  - [html_classes](#html_classes)
  - [html_attributes](#html_attributes)
- [Testing](#testing)
- [Changelog](#changelog)
- [Contributing](#contributing)
- [Credits](#credits)
- [Licence](#license)

## Installation

- Install the package with composer:

```bash
composer require okipa/laravel-html-helper
```

## API

Easily handle conditional HTML generation with the following helpers.

### html_classes

Calling this helper generates an HTML `class` tag encapsulating the given dynamic classes.

It accepts combination of strings, integers, arrays or null arguments.

```blade
@php
    $id = 17;
    $fullScreen = false;
    $darkMode = true;
@endphp
<div{{ html_classes(
    ['card', $id, 'text-left'],
    $fullScreen ? 'full-screen' : null,
    $darkMode ? ['bg-dark', 'text-white'] : null
) }}></div>
```

```html
<div class="card 17 text-left bg-dark text-white"></div>
```

You can call `app(Okipa\LaravelHtmlHelper\HtmlClasses)->render($classes)` if you want to avoid helper use.

### html_attributes

Calling this helper generates dynamic HTML attributes, taking care about the given key-only, value-only or key-value combinations.

It accepts combination of strings, arrays or null arguments.

```blade
@php
    $dragAndDrop = true;
    $disabled = false;
@endphp
<div{{ html_attributes(
    ['data-confirm' => __('Are you sure you want to delete this line?')],
    $dragAndDrop ? 'data-drag-drop' : null,
    $disabled ? ['disabled', 'data-forbid-click'] : null,
    'required'
) }}></div>
```

```html
<div data-confirm="Are you sure you want to delete this line?" data-drag-drop required></div>
```

You can call `app(Okipa\LaravelHtmlHelper\HtmlAttributes)->render($attributes)` if you want to avoid helper use.

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
