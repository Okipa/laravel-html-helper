<?php

namespace Okipa\LaravelHtmlHelper;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class HtmlHelperServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('Okipa\LaravelHtmlHelper', function (Application $app) {
            $tableList = $app->make(HtmlHelper::class);

            return $tableList;
        });
    }
}
