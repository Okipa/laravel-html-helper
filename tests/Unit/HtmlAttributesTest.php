<?php

namespace Okipa\LaravelHtmlHelper\Test\Unit;

use ErrorException;
use Exception;
use Okipa\LaravelHtmlHelper\HtmlAttributes;
use Okipa\LaravelHtmlHelper\Test\HtmlHelperTestCase;
use stdClass;

class HtmlAttributesTest extends HtmlHelperTestCase
{
    public function testSuccessRenderAttributesHtmlFromHelper()
    {
        $html = htmlAttributes(
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
        $this->assertEquals(
            ' attribute1Value attribute2Key="attribute2Value" attribute3Key attribute4Value attribute5Value attribute6Value attributes7Value attribute8Value attribute9Key="attribute9Value" attribute10Key attribute11Value attribute12Key',
            $html
        );
    }

    public function testSuccessRenderAttributesHtmlFromClass()
    {
        $html = app(HtmlAttributes::class)->render(
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
        $this->assertEquals(
            ' attribute1Value attribute2Key="attribute2Value" attribute3Key attribute4Value attribute5Value attribute6Value attributes7Value attribute8Value attribute9Key="attribute9Value" attribute10Key attribute11Value attribute12Key',
            $html
        );
    }

    public function testFailRenderAttributesHtmlWithIntGiven()
    {
        $this->expectException(Exception::class);
        classTag(htmlAttributes(10));
    }

    public function testFailRenderAttributesHtmlWithObjectGiven()
    {
        $this->expectException(ErrorException::class);
        htmlAttributes(new stdClass());
    }

    public function testFailRenderAttributesHtmlWithDoubleGiven()
    {
        $this->expectException(Exception::class);
        htmlAttributes(12.7);
    }

    public function testFailRenderAttributesHtmlWithBooleanGiven()
    {
        $this->expectException(Exception::class);
        htmlAttributes(true);
    }

    public function testRenderedHtml()
    {
        view()->addNamespace('htmlHelper', 'tests/views');
        $html = view('htmlHelper::htmlAttributes')->render();
        $this->assertStringContainsString(
            '<div attribute1Value attribute2Key="attribute2Value" attribute3Key attribute4Value attribute5Value attribute6Value attributes7Value attribute8Value attribute9Key="attribute9Value" attribute10Key attribute11Value attribute12Key></div>',
            $html
        );
    }

    public function testHtmlNoAttributesRenderedHtml()
    {
        view()->addNamespace('htmlHelper', 'tests/views');
        $html = view('htmlHelper::noHtmlAttributes')->render();
        $this->assertStringContainsString('<div></div>', $html);
    }
}
