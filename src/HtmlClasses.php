<?php

namespace Okipa\LaravelHtmlHelper;

use Illuminate\Support\Arr;
use Illuminate\Support\HtmlString;
use RuntimeException;

class HtmlClasses
{
    /**
     * @param string|int|array|null ...$classes
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function toHtml(...$classes): HtmlString
    {
        return $this->generateHtmlClasses(...$classes);
    }

    protected function generateHtmlClasses(): HtmlString
    {
        $classes = [];
        foreach (func_get_args() as $arg) {
            switch (gettype($arg)) {
                case 'string':
                case 'integer':
                    $classes[] = $arg;
                    break;
                case 'array':
                    $classes = $arg ? array_merge($classes, $arg) : $classes;
                    break;
                case 'NULL':
                    break;
                default:
                    throw new RuntimeException('Classes should be strings, integers, arrays or null: '
                        . gettype($arg) . ' given.');
            }
        }
        $classes = array_map('trim', array_filter(Arr::flatten($classes)));

        return new HtmlString($classes ? ' class="' . implode(' ', $classes) . '"' : '');
    }
}
