<?php

if (! function_exists('renderClass')) {
    function renderClass(...$classList)
    {
        return app(\Okipa\LaravelHtmlHelper\HtmlHelper::class)->renderClass(...$classList);
    }
}
