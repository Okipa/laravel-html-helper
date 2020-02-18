<?php

namespace Okipa\LaravelHtmlHelper;

use Exception;
use Illuminate\Support\Arr;
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
    protected function generateHtmlClassTag(): HtmlString
    {
        $classArray = [];
        foreach (func_get_args() as $arg) {
            switch (gettype($arg)) {
                case 'string':
                case 'integer':
                    $classArray[] = $arg;
                    break;
                case 'array':
                    $classArray = ! empty($arg) ? array_merge($classArray, $arg) : $classArray;
                    break;
                case 'NULL':
                    break;
                default:
                    throw new Exception('The given class arguments should be strings, integers or arrays : '
                        . gettype($arg) . ' type given.');
            }
        }
        $classArray = array_map('trim', array_filter(Arr::flatten($classArray)));

        return new HtmlString(! empty($classArray) ? ' class="' . implode(' ', $classArray) . '"' : '');
    }
}
