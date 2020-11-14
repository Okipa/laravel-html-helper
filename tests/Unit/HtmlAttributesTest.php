<?php

namespace Okipa\LaravelHtmlHelper\Test\Unit;

use Exception;
use Okipa\LaravelHtmlHelper\HtmlAttributes;
use Okipa\LaravelHtmlHelper\Test\HtmlHelperTestCase;
use stdClass;

class HtmlAttributesTest extends HtmlHelperTestCase
{
    /** @test */
    public function it_generates_html_attributes_from_helper_call(): void
    {
        $html = html_attributes(
            'attribute1Value',
            ['attribute2Key' => 'attribute2Value'],
            ['attribute3Key' => null],
            ['attribute4Value', 'attribute5Value'],
            '',
            null,
            ['' => 'attribute6Value'],
            ['attributes7Value', ['attribute8Value', 'attribute9Key' => 'attribute9Value']],
            ['attribute10Key' => ['attribute11Value']],
            ['attribute12Key' => '']
        );
        self::assertEquals(
            ' attribute1Value attribute2Key="attribute2Value" attribute3Key attribute4Value '
            . 'attribute5Value attribute6Value attributes7Value attribute8Value attribute9Key="attribute9Value" '
            . 'attribute10Key attribute11Value attribute12Key',
            $html
        );
    }

    /** @test */
    public function it_generates_html_attributes_from_class_call(): void
    {
        $html = app(HtmlAttributes::class)->toHtml(
            'attribute1Value',
            ['attribute2Key' => 'attribute2Value'],
            ['attribute3Key' => null],
            ['attribute4Value', 'attribute5Value'],
            '',
            null,
            ['' => 'attribute6Value'],
            ['attributes7Value', ['attribute8Value', 'attribute9Key' => 'attribute9Value']],
            ['attribute10Key' => ['attribute11Value']],
            ['attribute12Key' => '']
        );
        self::assertEquals(
            ' attribute1Value attribute2Key="attribute2Value" attribute3Key attribute4Value attribute5Value '
            . 'attribute6Value attributes7Value attribute8Value attribute9Key="attribute9Value" attribute10Key '
            . 'attribute11Value attribute12Key',
            $html
        );
    }

    /** @test */
    public function it_triggers_exception_with_object(): void
    {
        $this->expectException(Exception::class);
        html_attributes(new stdClass());
    }

    /** @test */
    public function it_triggers_exception_with_double(): void
    {
        $this->expectException(Exception::class);
        html_attributes(12.7);
    }

    /** @test */
    public function it_triggers_exception_with_bool(): void
    {
        $this->expectException(Exception::class);
        html_attributes(true);
    }

    /** @test */
    public function it_triggers_exception_with_int(): void
    {
        $this->expectException(Exception::class);
        html_classes(html_attributes(10));
    }

    /** @test */
    public function it_renders_html_attributes_in_view(): void
    {
        view()->addNamespace('html_helper', 'tests/views');
        $html = view('html_helper::html-attributes')->toHtml();
        self::assertStringContainsString(
            '<div attribute1Value attribute2Key="attribute2Value" attribute3Key attribute4Value attribute5Value ' .
            'attribute6Value attributes7Value attribute8Value attribute9Key="attribute9Value" attribute10Key '
            . 'attribute11Value attribute12Key></div>',
            $html
        );
    }

    /** @test */
    public function it_renders_no_html_attributes_in_view(): void
    {
        view()->addNamespace('html_helper', 'tests/views');
        $html = view('html_helper::no-html-attributes')->toHtml();
        self::assertStringContainsString('<div></div>', $html);
    }
}
