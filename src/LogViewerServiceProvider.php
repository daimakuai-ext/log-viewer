<?php

namespace Jblv\Admin\LogViewer;

use Illuminate\Support\ServiceProvider;

class LogViewerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'daimakuai-ext-logs');

        LogViewer::boot();
    }
}
