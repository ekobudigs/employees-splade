<?php

namespace App\Tables;

use App\Models\Department;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\AbstractTable;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Database\Eloquent\Collection;

class Departments extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('name', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(Department::class)
            ->defaultSort('id')
            ->allowedSorts(['id', 'name'])
            ->allowedFilters(['id', 'name', $globalSearch]);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['name'])
            ->column('id', sortable: true)
            ->column('name', sortable: true)
            // ->rowLink(function (User $user) {
            //     return route('admin.users.edit', $user);
            // })
            ->column('action')
            ->paginate(15);

        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
    }
}
