<?php

namespace Okipa\LaravelHtmlHelper;

use Exception;

class HtmlHelper
{
    /**
     * Render a html class tag filled with the given class list
     * @param mixed ...$classList
     *
     * @return string
     * @throws \Exception
     */
    public function renderClass(...$classList) : string
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

        return (string) 'class="' . implode(' ', $classArray) . '"';
    }
}
