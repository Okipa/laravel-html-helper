# Changelog

## [1.2.0](https://github.com/Okipa/laravel-html-helper/releases/tag/1.2.0)
2019-09-04
- Added compatibility for Laravel 6.
- Dropped support for php 7.1.

## [1.1.1](https://github.com/Okipa/laravel-html-helper/releases/tag/1.1.1)
2019-08-02
- Fixed `htmlAttributes()` feature which was adding a space before the returned value, even if it was supposed to be an empty space.

## [1.1.0](https://github.com/Okipa/laravel-html-helper/releases/tag/1.1.0)
2019-08-02
- `classTag()` and `htmlAttributes()` helpers are now callable directly after a html tag : they do add a space if the helper returns something and no space if nothing is returned.
```html
<!-- Example -->
<div{{ classTag(<your dynamic classes>) }}></div>
```

## [1.0.5](https://github.com/Okipa/laravel-html-helper/releases/tag/1.0.5)
2019-02-07
- Updated treatment to return an empty string when the classes list to return is empty.
