<?php

if (! function_exists('classTag')) {
    function classTag(...$classList)
    {
        return app(\Okipa\LaravelHtmlHelper\HtmlClassTag::class)->render(...$classList);
    }
}

if (! function_exists('htmlAttributes')) {
    function htmlAttributes(...$attributesList)
    {
        return app(\Okipa\LaravelHtmlHelper\HtmlAttributes::class)->render(...$attributesList);
    }
}