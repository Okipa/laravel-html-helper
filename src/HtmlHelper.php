<?php

namespace Okipa\LaravelHtmlHelper;

use Exception;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class HtmlHelper implements Htmlable
{
    /**
     * The generated html string.
     *
     * @property string $htmlString
     */
    protected $htmlString;

    /**
     * Render a html class tag filled with the given class list.
     *
     * @param mixed ...$classList
     *
     * @return \Okipa\LaravelHtmlHelper\HtmlHelper
     * @throws \Exception
     */
    public function generateClassHtmlTag(...$classList): HtmlHelper
    {
        $classArray = [];
        foreach (func_get_args() as $arg) {
            switch (gettype($arg)) {
                case 'string' :
                case 'integer' :
                    $classArray[] = $arg;
                    break;
                case 'array':
                    $classArray = array_merge($classArray, array_filter(array_flatten($arg)));
                    break;
                case 'NULL':
                    break;
                default:
                    throw new Exception('The given class arguments should be strings, integers or arrays : '
                                        . gettype($arg) . ' type given for « ' . $arg . ' » argument.');
            }
        }
        $classArray = array_map('trim', $classArray);
        $this->htmlString = new HtmlString('class="' . implode(' ', $classArray) . '"');

        return $this;
    }

    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        return (string) $this->htmlString;
    }

    /**
     * Render the html string.
     *
     * @return mixed
     */
    public function render()
    {
        return $this->htmlString;
    }
}
