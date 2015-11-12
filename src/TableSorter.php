<?php

namespace Todstoychev\TableSorter;

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
    public static function sort($action, $columnName, $param, $order = 'asc', $limit = 10) {
        If ($order == 'asc') {
            $order = 'desc';
        } else {
            $order = 'asc';
        }

        return view('vendor.todstoychev.table-sorter.sort');
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
    public static function sortSearch($action, $columnName, $search = null, $param = null, $order = 'asc') {
        If ($order == 'asc') {
            $order = 'desc';
        } else {
            $order = 'asc';
        }

        return view('vendor.todstoychev.table-sorter.sort_search');
    }
}