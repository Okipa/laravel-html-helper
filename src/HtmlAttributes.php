<?php

namespace Okipa\LaravelHtmlHelper;

use Exception;
use Illuminate\Support\HtmlString;

class HtmlAttributes extends HtmlHelper
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
        return $this->generateHtmlString(...$classList);
    }

    /**
     * Render html attributes from the given attributes list.
     *
     * @param mixed ...$classList
     *
     * @return \Illuminate\Support\HtmlString
     * @throws \Exception
     */
    public function generateHtmlString(...$classList): HtmlString
    {
        $attributesArray = [];
        foreach (func_get_args() as $arg) {
            switch (gettype($arg)) {
                case 'string' :
                    $attributesArray[] = $arg;
                    break;
                case 'array':
                    $this->analyseArrayAttributes($arg, $attributesArray);
                    break;
                case 'NULL':
                    break;
                default:
                    throw new Exception('The given attributes arguments should be strings or arrays : '
                                        . gettype($arg) . ' type given for « ' . $arg . ' » argument.');
            }
        }
        $attributesArray = array_map('trim', array_filter($attributesArray));
        $html = '';
        foreach ($attributesArray as $key => $attribute) {
            $spacer = strlen($html) ? ' ' : '';
            if ($key && is_string($key)) {
                $html .= $spacer . $key . ($attribute ? '="' . $attribute . '"' : '');
            } else {
                $html .= $spacer . $attribute;
            }
        }

        return new HtmlString($html);
    }

    /**
     * @param array $array
     * @param array $attributes
     */
    private function analyseArrayAttributes(array $array, array &$attributes)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (! empty($key) && is_string($key)) {
                    $attributes[] = $key;
                }
                $this->analyseArrayAttributes($value, $attributes);
            } else {
                if (! empty($key) && is_string($key)) {
                    if ($value) {
                        $attributes[$key] = $value;
                    } else {
                        $attributes[] = $key;
                    }
                } else {
                    if ($value) {
                        $attributes[] = $value;
                    } else {
                        $attributes[] = $key;
                    }
                }
            }
        }
    }
}