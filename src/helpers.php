<?php

use Illuminate\Support\HtmlString;
use Okipa\LaravelHtmlHelper\HtmlAttributes;
use Okipa\LaravelHtmlHelper\HtmlClasses;

if (! function_exists('html_classes')) {
    /**
     * @param string|int|array|null ...$classList
     *
     * @return \Illuminate\Support\HtmlString
     */
    function html_classes(...$classList): HtmlString
    {
        return app(HtmlClasses::class)->toHtml(...$classList);
    }
}

if (! function_exists('html_attributes')) {
    /**
     * @param string|array|null ...$attributesList
     *
     * @return \Illuminate\Support\HtmlString
     */
    function html_attributes(...$attributesList): HtmlString
    {
        return app(HtmlAttributes::class)->toHtml(...$attributesList);
    }
}
