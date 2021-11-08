<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class PostFilters extends QueryFilter
{
    public const DEFAULT_FILTERS = [
        "orderby" => "post_date",
        "order" => "desc",
        "post_type" => "post",
        "post_status" => "publish",
        "posts_per_page" => 1,
    ];

    public function orderby(string $orderby): Builder
    {
        return $this->builder->orderby($orderby, $this->request["order"] ?? self::DEFAULT_FILTERS["order"]);
    }

    /**
     * Select post ID.
     * @param int $post_id 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function post_id(int $post_id): Builder
    {
        return $this->builder->where('ID', $post_id);
    }

    /**
     * Select post slug.
     * @param string $post_name 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function post_name(string $post_name): Builder
    {
        return $this->builder->where('post_name', 'like', '%' . $post_name . '%');
    }

    /**
     * Retrieves all posts from the selected post type.
     * @param string $post_type 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function post_type(string $post_type): Builder
    {
        return $this->builder->wherePostType($post_type);
    }

    /**
     * Retrieves all posts from the selected post status.
     * @param string $post_status 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function post_status(string $post_status): Builder
    {
        return $this->builder->wherePostStatus($post_status);
    }

    /**
     * Retrieves the list of child posts for a given post ID or post slug.
     * @param string|int $post_children 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function post_children(string|int $post_children): Builder
    {
        return $this->builder->whereHas('parents', function ($q) use ($post_children) {
            (intval($post_children)) ? $q->where('ID', $post_children) : $q->where('post_name', $post_children);
        });
    }

    /**
     * Retrieves the post parent for a given post ID or post slug.
     * @param string|int $post_parent 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function post_parent(string|int $post_parent): Builder
    {
        return $this->builder->whereHas('childrens', function ($q) use ($post_parent) {
            (intval($post_parent)) ? $q->where('ID', $post_parent) : $q->where('post_name', $post_parent);
        });
    }
}
