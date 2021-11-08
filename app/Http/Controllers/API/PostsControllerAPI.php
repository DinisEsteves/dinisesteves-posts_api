<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Post;
use App\Http\Requests\API\PostRequest;
use App\Http\Filters\PostFilters;
use App\Http\Resources\PostResource;
use Illuminate\Support\Arr;

class PostsControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostRequest $request)
    {
        $array = [...PostFilters::DEFAULT_FILTERS, ...$request->validated()];

        $posts = Post::filter(new PostFilters($array))->paginate($array["posts_per_page"]);

        return PostResource::collection($posts);
    }
}
