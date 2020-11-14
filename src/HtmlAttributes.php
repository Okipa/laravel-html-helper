<?php

namespace Okipa\LaravelHtmlHelper;

use Illuminate\Support\HtmlString;
use RuntimeException;

class HtmlAttributes
{
    /**
     * @param string|array|null ...$attributes
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function toHtml(...$attributes): HtmlString
    {
        return $this->generateHtmlString(...$attributes);
    }

    /**
     * @param string|array|null ...$attributes
     *
     * @return \Illuminate\Support\HtmlString
     */
    protected function generateHtmlString(...$attributes): HtmlString
    {
        $builtAttributes = $this->buildAttributes(...$attributes);
        $html = $this->buildHtmlString($builtAttributes);

        return new HtmlString($html);
    }

    protected function buildAttributes(): array
    {
        $attributes = [];
        foreach (func_get_args() as $arg) {
            switch (gettype($arg)) {
                case 'string':
                    $attributes[] = $arg;
                    break;
                case 'array':
                    $this->buildAttributeFromArray($arg, $attributes);
                    break;
                case 'NULL':
                    break;
                default:
                    throw new RuntimeException('The given attributes arguments should be strings or arrays: '
                        . gettype($arg) . ' type given.');
            }
        }

        return array_map('trim', array_filter($attributes));
    }

    protected function buildAttributeFromArray(array $attribute, array &$attributes): void
    {
        foreach ($attribute as $key => $value) {
            if (is_array($value)) {
                if (is_string($key)) {
                    $attributes[] = $key;
                }
                $this->buildAttributeFromArray($value, $attributes);
                continue;
            }
            if (is_string($key) && $value) {
                $attributes[$key] = $value;
                continue;
            }
            if ($value) {
                $attributes[] = $value;
                continue;
            }
            $attributes[] = $key;
        }
    }

    protected function buildHtmlString(array $attributes): string
    {
        $html = '';
        foreach ($attributes as $key => $attribute) {
            $spacer = $html ? ' ' : '';
            if ($key && is_string($key)) {
                $html .= $spacer . $key . ($attribute ? '="' . $attribute . '"' : '');
            } else {
                $html .= $spacer . $attribute;
            }
        }

        return ($html ? ' ' : '') . $html;
    }
}
