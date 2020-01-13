<?php

namespace App\Services;

use Closure;
use Illuminate\Database\Eloquent\Model;

class BaseService
{
    protected $request;

    protected function atomic(Closure $callback)
    {
        return \DB::transaction($callback);
    }

    protected function dataWrapper($data)
    {
        $results = [];

        $results['data'] = $data['data'];

        unset($data['data']);

        $results['meta'] = $data;

        return $results;
    }

    protected function queryBuilder($baseQuery, $attributes, $includes = [])
    {
        if (is_string($baseQuery)) {
            $baseQuery = ($baseQuery)::query();
        }

        $sort = (@$attributes['sort']) ? $attributes['sort'] : null;
        $sortRule = (@$attributes['sort_rule']) ? $attributes['sort_rule'] : null;

        $baseQuery = $baseQuery->with($includes);

        if (!is_null($sort))
            $baseQuery = $baseQuery->orderBy($sort, $sortRule);

        return $baseQuery;
    }


}