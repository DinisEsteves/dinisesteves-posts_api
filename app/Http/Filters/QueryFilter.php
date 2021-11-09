<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter
{
    protected $request;
    protected $builder;

    public function __construct($request = null)
    {
        if (is_null($request)) {
            $request = request();
        }
        $this->request = $request;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {
            if (method_exists($this, $name)) {
                call_user_func_array([$this, $name], array_filter([$value]));
            }
        }

        return $this->builder;
    }

    public function filters()
    {
        if (is_array($this->request)) {
            return $this->request;
        }

        return method_exists($this->request, 'all') ? $this->request->all() : [];
    }
}
