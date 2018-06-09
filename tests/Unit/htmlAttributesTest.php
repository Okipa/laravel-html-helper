<?php

namespace Okipa\LaravelHtmlHelper\Test\Unit;

use Exception;
use Okipa\LaravelHtmlHelper\HtmlAttributes;
use Okipa\LaravelHtmlHelper\Test\HtmlhelperTestCase;
use stdClass;

class htmlAttributesTest extends HtmlhelperTestCase
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
        $this->assertEquals('attribute1Value attribute2Key="attribute2Value" attribute3Key attribute4Value attribute5Value attribute6Value attributes7Value attribute8Value attribute9Key="attribute9Value" attribute10Key attribute11Value attribute12Key', $html);
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
        $this->assertEquals('attribute1Value attribute2Key="attribute2Value" attribute3Key attribute4Value attribute5Value attribute6Value attributes7Value attribute8Value attribute9Key="attribute9Value" attribute10Key attribute11Value attribute12Key', $html);
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage The given attributes arguments should be strings or arrays : integer type given for «
     *                           10 » argument.
     */
    public function testFailRenderAttributesHtmlWithIntGiven()
    {
        classTag(htmlAttributes(10));
    }

    /**
     * @expectedException ErrorException
     * @expectedExceptionMessage Object of class stdClass could not be converted to string
     */
    public function testFailRenderAttributesHtmlWithObjectGiven()
    {
        htmlAttributes(new stdClass());
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage The given attributes arguments should be strings or arrays : double type given
     *                           for « 12.7 » argument.
     */
    public function testFailRenderAttributesHtmlWithDoubleGiven()
    {
        htmlAttributes(12.7);
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage The given attributes arguments should be strings or arrays : boolean type given
     *                           for « 1 » argument.
     */
    public function testFailRenderAttributesHtmlWithBooleanGiven()
    {
        htmlAttributes(true);
    }

    public function testRenderedHtml()
    {
        view()->addNamespace('htmlHelper', 'tests/views');
        $html = view('htmlHelper::htmlAttributes')->render();
        $this->assertContains('<div attribute1Value attribute2Key="attribute2Value" attribute3Key attribute4Value attribute5Value attribute6Value attributes7Value attribute8Value attribute9Key="attribute9Value" attribute10Key attribute11Value attribute12Key></div>', $html);
    }
}
