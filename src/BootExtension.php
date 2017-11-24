<?php

namespace Jblv\Admin\LogViewer;

use Jblv\Admin\Admin;

trait BootExtension
{
    /**
     * {@inheritdoc}
     */
    public static function boot()
    {
        static::registerRoutes();

        Admin::extend('log-viewer', __CLASS__);
    }

    /**
     * Register routes for laravel-admin.
     *
     * @return void
     */
    protected static function registerRoutes()
    {
        parent::routes(function ($router) {
            /* @var \Illuminate\Routing\Router $router */
            $router->get('logs', 'Jblv\Admin\LogViewer\LogController@index')->name('log-viewer-index');
            $router->get('logs/{file}', 'Jblv\Admin\LogViewer\LogController@index')->name('log-viewer-file');
            $router->get('logs/{file}/tail', 'Jblv\Admin\LogViewer\LogController@tail')->name('log-viewer-tail');
        });
    }

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        parent::createMenu('Log viwer', 'logs', 'fa-database');

        parent::createPermission('Logs', 'ext.log-viewer', 'logs*');
    }
}
