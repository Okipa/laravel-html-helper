<?php

namespace Okipa\LaravelHtmlHelper\Test\Unit;

use ErrorException;
use Exception;
use Okipa\LaravelHtmlHelper\Test\HtmlHelperTestCase;
use stdClass;

class ClassTagTest extends HtmlHelperTestCase
{
    public function testSuccessRenderClassTagHtmlFromHelper()
    {
        $html = classTag(
            'class1',
            ['class2', 'class3', null],
            null,
            '',
            ['class4', ['class5 ', 'class6Key' => 'class6']],
            [],
            7
        );
        $this->assertEquals(' class="class1 class2 class3 class4 class5 class6 7"', $html);
    }

    public function testEmptyClassTagHtml()
    {
        $this->assertEquals('', classTag([]));
    }

    public function testSuccessRenderClassTagHtmlFromClass()
    {
        $html = app(\Okipa\LaravelHtmlHelper\HtmlClassTag::class)->render(
            'class1',
            ['class2', 'class3', null],
            null,
            [],
            ['class4', ['class5 ', 'class6Key' => 'class6']],
            7
        );
        $this->assertEquals(' class="class1 class2 class3 class4 class5 class6 7"', $html);
    }

    public function testFailRenderClassTagHtmlWithObjectGiven()
    {
        $this->expectException(ErrorException::class);
        classTag(new stdClass());
    }

    public function testFailRenderClassTagHtmlWithDoubleGiven()
    {
        $this->expectException(Exception::class);
        classTag(12.7);
    }

    public function testFailRenderClassTagHtmlWithBooleanGiven()
    {
        $this->expectException(Exception::class);
        classTag(true);
    }

    public function testRenderedHtml()
    {
        view()->addNamespace('htmlHelper', 'tests/views');
        $html = view('htmlHelper::classTag')->render();
        $this->assertStringContainsString('<div class="class1 class2 class3 class4 class5 class6 7"></div>', $html);
    }
}
