# Changelog

## [1.3.1](https://github.com/Okipa/laravel-html-helper/compare/1.3.0...1.3.1)

2020-03-03

* Added testing files to .gitattributes export-ignore.

## [1.3.0](https://github.com/Okipa/laravel-html-helper/compare/1.2.0...1.3.0)

2020-02-18

* Dropped support for Laravel 5.5, 5.6 and 5.7.
* Added support for Laravel 7.

## [1.2.0](https://github.com/Okipa/laravel-html-helper/compare/1.1.1...1.2.0)

2019-09-04

* Added support for Laravel 6.
* Dropped support for php 7.1.

## [1.1.1](https://github.com/Okipa/laravel-html-helper/compare/1.1.0...1.1.1)

2019-08-02

* Fixed `htmlAttributes()` feature which was adding a space before the returned value, even if it was supposed to be an empty space.

## [1.1.0](https://github.com/Okipa/laravel-html-helper/compare/1.0.5...1.1.0)

2019-08-02

* `classTag()` and `htmlAttributes()` helpers are now callable directly after a html tag : they do add a space if the helper returns something and no space if nothing is returned.

```html
<div{{ classTag(<your dynamic classes>) }}></div>
```

## [1.0.5](https://github.com/Okipa/laravel-html-helper/compare/1.1.4...1.0.5)

2019-02-07

* Updated treatment to return an empty string when the classes list to return is empty.
