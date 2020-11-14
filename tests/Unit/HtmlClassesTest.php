<?php

namespace Okipa\LaravelHtmlHelper\Test\Unit;

use Exception;
use Okipa\LaravelHtmlHelper\HtmlClasses;
use Okipa\LaravelHtmlHelper\Test\HtmlHelperTestCase;
use stdClass;

class HtmlClassesTest extends HtmlHelperTestCase
{
    /** @test */
    public function it_generates_html_classes_from_helper_call(): void
    {
        $html = html_classes(
            'class1',
            ['class2', 'class3', null],
            null,
            '',
            ['class4', ['class5 ', 'class6Key' => 'class6']],
            [],
            7
        );
        self::assertEquals(' class="class1 class2 class3 class4 class5 class6 7"', $html);
    }

    /** @test */
    public function it_generates_html_classes_from_class_call(): void
    {
        $html = app(HtmlClasses::class)->toHtml(
            'class1',
            ['class2', 'class3', null],
            null,
            [],
            ['class4', ['class5 ', 'class6Key' => 'class6']],
            7
        );
        self::assertEquals(' class="class1 class2 class3 class4 class5 class6 7"', $html);
    }

    /** @test */
    public function it_returns_empty_string_with_empty_inputs(): void
    {
        self::assertEquals('', html_classes([]));
        self::assertEquals('', html_classes(null));
        self::assertEquals('', html_classes(''));
    }

    /** @test */
    public function it_triggers_exception_with_object(): void
    {
        $this->expectException(Exception::class);
        html_classes(new stdClass());
    }

    /** @test */
    public function it_triggers_exception_with_double(): void
    {
        $this->expectException(Exception::class);
        html_classes(12.7);
    }

    /** @test */
    public function it_triggers_exception_with_bool(): void
    {
        $this->expectException(Exception::class);
        html_classes(true);
    }

    /** @test */
    public function it_renders_html_classes_in_view(): void
    {
        view()->addNamespace('html_helper', 'tests/views');
        $html = view('html_helper::html-classes')->toHtml();
        self::assertStringContainsString('<div class="class1 class2 class3 class4 class5 class6 7"></div>', $html);
    }
}
