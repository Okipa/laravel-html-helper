<?php

namespace Okipa\LaravelHtmlHelper\Test;

use Okipa\LaravelHtmlHelper\HtmlHelperServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class HtmlHelperTestCase extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [HtmlHelperServiceProvider::class];
    }
}
