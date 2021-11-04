<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilters extends QueryFilter
{
    public function post_id(int $id = null): Builder
    {
        return $this->builder->where('ID', $id);
    }

    public function post_name(string $post_name = null): Builder
    {
        return $this->builder->where('post_name', 'like', '%' . $post_name . '%');
    }

    public function post_type(string $post_type = 'post'): Builder
    {
        return $this->builder->where('post_type', $post_type);
    }

    public function post_status(string $post_status = 'publish'): Builder
    {
        return $this->builder->where('post_status', $post_status);
    }
}
