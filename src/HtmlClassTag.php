<?php

namespace Okipa\LaravelHtmlHelper;

use Exception;
use Illuminate\Support\HtmlString;

class HtmlClassTag extends HtmlHelper
{
    /**
     * Render the generated html.
     *
     * @param mixed ...$classList
     *
     * @return \Illuminate\Support\HtmlString
     * @throws \Exception
     */
    public function render(...$classList): HtmlString
    {
        return $this->generateHtmlClassTag(...$classList);
    }

    /**
     * Render a html class tag filled with the given class list.
     *
     * @return \Illuminate\Support\HtmlString
     * @throws \Exception
     */
    protected function generateHtmlClassTag()
    {
        $classArray = [];
        foreach (func_get_args() as $arg) {
            switch (gettype($arg)) {
                case 'string' :
                case 'integer' :
                    $classArray[] = $arg;
                    break;
                case 'array':
                    $classArray = array_merge($classArray, $arg);
                    break;
                case 'NULL':
                    break;
                default:
                    throw new Exception('The given class arguments should be strings, integers or arrays : '
                                        . gettype($arg) . ' type given for « ' . $arg . ' » argument.');
            }
        }
        $classArray = array_map('trim', array_filter(array_flatten($classArray)));

        return new HtmlString('class="' . implode(' ', $classArray) . '"');
    }
}