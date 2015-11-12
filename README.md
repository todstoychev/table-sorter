Table sorter is simple Laravel 5 module. It can be used to sort table columns.

# Instalation
Use the standart composer way to install the module: 

```
composer require todstoychev/table-sorter
```

or add to the require clause of your composer.json: 

```json
"todstoychev/table-sorter": "dev-master"
```

# Configuration
Open ```config/app.php``` and add to ```'providers'``` the module service provider: 

```php
'providers' => [
    // ...
    Todstoychev\TableSorter\ServiceProvider::class,
    // ...
],
```

Then create an alias for the package main class:
```php
'aliases' => [
    // ...
    'TableSorter' => Todstoychev\TableSorter\TableSorter::class,
    // ...
],
```

Run ```php artisan vendor/publish``` command to publish the views contained in the package.

# Usage
The class contains 2 methods - sort() and sortSearch(). Both take different params. The methods return simple templates used to form the column name link with the necessary parameters. Since those parameters are presented in the Laravel request object, you can use them to construct you database query.
For example you can use in your template
```html
<th>
    {!! TableSorter::sort('Namespace\MyController@getMyAction', 'text.to.use.for.columnName', 'database.table.columnName', 'asc', 10) !!}
</th>
```

First argument is your get page controller method. Second argument is the text that should be shown as column name in the table. Third argument is the database table column name or alias from which the data is coming. Fourth one is the sorting direction. This can be provided as variable since it is determined by the module itself. Last argument is used to represent items per page number, in case you are using pagination. 

The other method provided by the module can be used to sort search results.

```html
<th>
    {!! TableSorter::sortSearch('Namespace\MyController@getMyAction', 'text.to.use.for.columnName', 'search.string', 'database.table.columnName', 'asc') !!}
</th>
```

This one works almost in the same way. The difference is that it not provides value for items per page and has search string parameter.

To make this will work you will need to create something similar in your controller:

```php
class MyController
{
    public function getMyAction(Request $request)
    {
        // Get parameters 
        $limit = $request->input('limit') ? $request->input('limit') : null;
        $order = $request->input('order') ? $request->input('order') : null;
        // Database column name or alias
        $param = $request->input('param') ? $request->input('param') : null;
        
        $query = MyModel::orderBy($param, $order);
        $results = $query->paginate($limit);
        
        return view('my.view', [
            'limit' => $limit,
            'order' => $order,
            'param' => $parm,
            'results' => $results
        ]);
    }
}
```

