<?php

namespace Okipa\LaravelHtmlHelper;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

abstract class HtmlHelper implements Htmlable
{
    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml(): string
    {
        return (string) $this->render();
    }

    /**
     * Render the generated html.
     *
     * @param mixed ...$args
     *
     * @return \Illuminate\Support\HtmlString
     */
    abstract public function render(...$args): HtmlString;
}
