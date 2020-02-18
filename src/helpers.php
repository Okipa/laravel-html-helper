<?php

use Illuminate\Support\HtmlString;
use Okipa\LaravelHtmlHelper\HtmlAttributes;
use Okipa\LaravelHtmlHelper\HtmlClassTag;

if (! function_exists('classTag')) {
    /**
     * @param mixed ...$classList
     *
     * @return \Illuminate\Support\HtmlString
     * @throws \Exception
     */
    function classTag(...$classList): HtmlString
    {
        return (new HtmlClassTag)->render(...$classList);
    }
}

if (! function_exists('htmlAttributes')) {
    /**
     * @param mixed ...$attributesList
     *
     * @return \Illuminate\Support\HtmlString
     * @throws \Exception
     */
    function htmlAttributes(...$attributesList): HtmlString
    {
        return (new HtmlAttributes)->render(...$attributesList);
    }
}
