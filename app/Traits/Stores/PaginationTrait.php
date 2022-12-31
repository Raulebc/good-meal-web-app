<?php

namespace App\Traits\Stores;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait PaginationTrait
{
    /**
     * Paginate the given query.
     *
     * @param  Request  $request
     * @param  Builder  $query
     * @param  int  $perPage
     * @param  string  $pageName
     * @param  int|null  $page
	 * 
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(Request $request, Builder $query, $perPage = null, $pageName = 'page', $page = null)
    {
        $perPage = $perPage ?: $request->input('per_page', 10);

        $page = $page ?: $request->input('page', 1);

        return $query->simplePaginate($perPage, ['*'], $pageName, $page);
    }
}