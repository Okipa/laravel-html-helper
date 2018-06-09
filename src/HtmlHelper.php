<?php

namespace Okipa\LaravelHtmlHelper;

use Illuminate\Contracts\Support\Htmlable;

abstract class HtmlHelper implements Htmlable
{
    /**
     * The generated html string.
     *
     * @property string $htmlString
     */
    protected $htmlString;

    /**
     * Render the generated html.
     *
     * @param mixed ...$args
     *
     * @return mixed
     */
    abstract public function render(...$args);

    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        return (string) $this->render();
    }
}
