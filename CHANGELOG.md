# Changelog

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
