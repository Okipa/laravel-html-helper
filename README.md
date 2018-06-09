# Laravel Html Helper

[![Source Code](https://img.shields.io/badge/source-okipa/laravel--html--helper-blue.svg)](https://github.com/Okipa/laravel-html-helper)
[![Latest Version](https://img.shields.io/github/release/okipa/laravel-html-helper.svg?style=flat-square)](https://github.com/Okipa/laravel-html-helper/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/okipa/laravel-html-helper.svg?style=flat-square)](https://packagist.org/packages/okipa/laravel-html-helper)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![Build Status](https://scrutinizer-ci.com/g/Okipa/laravel-html-helper/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Okipa/laravel-html-helper/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/Okipa/laravel-html-helper/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Okipa/laravel-html-helper/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Okipa/laravel-html-helper/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Okipa/laravel-html-helper/?branch=master)

Some usefull methods to generate clean HTML with Laravel.

------------------------------------------------------------------------------------------------------------------------

## Installation

- Install the package with composer :
```bash
composer require okipa/laravel-html-helper
```

- Laravel 5.5+ uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.
If you don't use auto-discovery or if you use a Laravel 5.4- version, add the package service provider in the `register()` method from your `app/Providers/AppServiceProvider.php` :
```php
// laravel html helper
// https://github.com/Okipa/laravel-html-helper
$this->app->register(Okipa\LaravelHtmlHelper\HtmlHelperServiceProvider::class);
```

------------------------------------------------------------------------------------------------------------------------

## API

##### `classTag(...$classList) : HtmlString`
Render a html class tag filled with the given class list .  

```php
// in your html
<div {{ classTag(
    ['imported', 'class', 'array', 'from' 'config'],
    ['nested', ['class', 'arrays']],
    'another-class'
) }}></div>
// gives
<div class="imported class array from config nested class arrays another-class"></div>
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

##### `htmlAttributes(...$attributesList) : HtmlString`
Render html attributes from the given attributes list.

```php
// in your html
<div {{ htmlAttributes(
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

------------------------------------------------------------------------------------------------------------------------

## Contributors

- [ACID-Solutions](https://github.com/ACID-Solutions)
