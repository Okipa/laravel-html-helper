<?php

namespace Okipa\LaravelHtmlHelper\Test;

use Okipa\LaravelHtmlHelper\HtmlHelperServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class HtmlHelperTestCase extends TestCase
{

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            HtmlHelperServiceProvider::class,
        ];
    }
}
