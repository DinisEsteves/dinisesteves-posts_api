<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\API\PostRequest;
use App\Http\Filters\PostFilters;
use App\Http\Resources\PostResource;
use App\Http\Services\PostService;

class PostsControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\PostResource;
     */
    public function index(PostRequest $request)
    {
        $filters = new PostFilters($request);

        $posts = Post::filter($filters)->paginate($filters->filters["posts_per_page"]);

        return PostResource::collection(
            PostService::cache($request->boolean('cache'), $posts)
        );
    }
}
