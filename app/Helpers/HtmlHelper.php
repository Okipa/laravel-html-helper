<?php

if (! function_exists('classTag')) {
    function classTag(...$classList)
    {
        return app(\Okipa\LaravelHtmlHelper\HtmlHelper::class)->generateClassHtmlTag(...$classList)->render();
    }
}
