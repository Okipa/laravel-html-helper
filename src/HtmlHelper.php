<?php

namespace Okipa\LaravelHtmlHelper;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

abstract class HtmlHelper implements Htmlable
{
    public function toHtml(): string
    {
        return (string) $this->render();
    }

    /**
     * @param mixed ...$args
     *
     * @return \Illuminate\Support\HtmlString
     */
    abstract public function render(...$args): HtmlString;
}
