<?php

namespace Okipa\LaravelHtmlHelper\Test\Unit;

use ErrorException;
use Exception;
use Okipa\LaravelHtmlHelper\Test\HtmlhelperTestCase;
use stdClass;

class ClassTagTest extends HtmlhelperTestCase
{
    public function testSuccessRenderClassTagHtmlFromHelper()
    {
        $html = classTag(
            'class1',
            ['class2', 'class3', null],
            null,
            '',
            ['class4', ['class5 ', 'class6Key' => 'class6']],
            7
        );
        $this->assertEquals('class="class1 class2 class3 class4 class5 class6 7"', $html);
    }

    public function testSuccessRenderClassTagHtmlFromClass()
    {
        $html = app(\Okipa\LaravelHtmlHelper\HtmlClassTag::class)->render(
            'class1',
            ['class2', 'class3', null],
            null,
            ['class4', ['class5 ', 'class6Key' => 'class6']],
            7
        );
        $this->assertEquals('class="class1 class2 class3 class4 class5 class6 7"', $html);
    }

    /**
     * @expectedException ErrorException
     * @expectedExceptionMessage Object of class stdClass could not be converted to string
     */
    public function testFailRenderClassTagHtmlWithObjectGiven()
    {
        classTag(new stdClass());
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage The given class arguments should be strings, integers or arrays : double type given
     *                           for « 12.7 » argument.
     */
    public function testFailRenderClassTagHtmlWithDoubleGiven()
    {
        classTag(12.7);
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage The given class arguments should be strings, integers or arrays : boolean type given
     *                           for « 1 » argument.
     */
    public function testFailRenderClassTagHtmlWithBooleanGiven()
    {
        classTag(true);
    }

    public function testRenderedHtml()
    {
        view()->addNamespace('htmlHelper', 'tests/views');
        $html = view('htmlHelper::classTag')->render();
        $this->assertContains('<div class="class1 class2 class3 class4 class5 class6 7"></div>', $html);
    }
}
