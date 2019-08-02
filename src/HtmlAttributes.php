<?php

namespace Okipa\LaravelHtmlHelper;

use Exception;
use Illuminate\Support\HtmlString;

class HtmlAttributes extends HtmlHelper
{
    /**
     * Render the generated html.
     *
     * @param mixed ...$attributesList
     *
     * @return \Illuminate\Support\HtmlString
     * @throws \Exception
     */
    public function render(...$attributesList): HtmlString
    {
        return $this->generateHtmlString(...$attributesList);
    }

    /**
     * Render html attributes from the given attributes list.
     *
     * @param mixed ...$attributesList
     *
     * @return \Illuminate\Support\HtmlString
     * @throws \Exception
     */
    protected function generateHtmlString(...$attributesList): HtmlString
    {
        $attributesArray = $this->buildAttributesArray(...$attributesList);
        $html = $this->buildHtmlString($attributesArray);

        return new HtmlString($html);
    }

    /**
     * Build the attributes array
     *
     * @return array
     * @throws \Exception
     */
    protected function buildAttributesArray(): array
    {
        $attributesArray = [];
        foreach (func_get_args() as $arg) {
            switch (gettype($arg)) {
                case 'string':
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

        return array_map('trim', array_filter($attributesArray));
    }

    /**
     * @param array $array
     * @param array $attributes
     */
    private function analyseArrayAttributes(array $array, array &$attributes): void
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

    /**
     * Build the html string from the attributes array.
     *
     * @param array $attributesArray
     *
     * @return string
     */
    protected function buildHtmlString(array $attributesArray): string
    {
        $html = '';
        foreach ($attributesArray as $key => $attribute) {
            $spacer = strlen($html) ? ' ' : '';
            if ($key && is_string($key)) {
                $html .= $spacer . $key . ($attribute ? '="' . $attribute . '"' : '');
            } else {
                $html .= $spacer . $attribute;
            }
        }

        return strlen($html) ? ' ' . $html : '';
    }
}
