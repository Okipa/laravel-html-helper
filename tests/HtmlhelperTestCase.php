<?php

namespace Okipa\LaravelHtmlHelper\Test;

use Orchestra\Testbench\TestCase;

abstract class HtmlhelperTestCase extends TestCase
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
            'Okipa\LaravelHtmlHelper\HtmlHelperServiceProvider',
        ];
    }
}
