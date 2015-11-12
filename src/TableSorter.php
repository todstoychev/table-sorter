<?php

namespace Todstoychev\TableSorter;

/**
 * Simple table sorter.
 *
 * @author Todor Todorov <todstoychev@gmail.com>
 * @package Todstoychev\TableSorter
 */
class TableSorter
{
    /**
     * Table column sorter
     *
     * @param string $action "Controller@action"
     * @param string $columnName Column name to show in the table
     * @param string $param Parameter to order(database table column name)
     * @param string $order Order direction
     * @param integer $limit Items per page
     *
     * @return string
     */
    public static function sort($action, $columnName, $param, $order = 'asc', $limit = 10)
    {
        return view(
            'todstoychev.table-sorter.sort',
            [
                'action' => $action,
                'columnName' => $columnName,
                'param' => $param,
                'order' => static::defineOrder($order),
                'limit' => $limit,
            ]
        );
    }

    /**
     * Table column sorter
     *
     * @param string $action "Controller@action"
     * @param string $columnName Column name
     * @param string $search Search keyword
     * @param string $param Parameter to order(databese table column name)
     * @param string $order Order direction
     *
     * @return string
     */
    public static function sortSearch($action, $columnName, $search = null, $param = null, $order = 'asc')
    {
        return view(
            'todstoychev.table-sorter.sort_search',
            [
                'action' => $action,
                'columnName' => $columnName,
                'search' => $search,
                'param' => $param,
                'order' => static::defineOrder($order)
            ]
        );
    }

    /**
     * Define order direction string
     *
     * @param string $order
     *
     * @return string
     */
    protected static function defineOrder($order)
    {
        If ($order == 'asc') {
            return 'desc';
        }

        return 'asc';
    }
}