<?php

namespace Okipa\LaravelHtmlHelper;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class HtmlHelperServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('Okipa\LaravelHtmlHelper', function (Application $app) {
            return $app->make(HtmlHelper::class);
        });
    }
}
