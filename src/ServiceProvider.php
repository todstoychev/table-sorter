<?php

namespace Todstoychev\TableSorter;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Service provider class
 *
 * @author Todor Todorov <todstoychev@gmail.com>
 * @package Todstoychev\TableSorter
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * @inheritdoc
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'table-sorter');

        $this->publishes(
            [
                __DIR__ . '/resources/views' => base_path('resources/views/todstoychev/table-sorter'),
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function register()
    {

    }
}
