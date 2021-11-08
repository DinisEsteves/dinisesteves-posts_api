<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Post;
use App\Http\Requests\API\PostRequest;
use App\Http\Filters\PostFilters;
use Illuminate\Support\Arr;

class PostsControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostRequest $request, PostFilters $filters)
    {
        $array = [...PostFilters::DEFAULT_FILTERS, ...$filters->filters()];

        $posts = Post::filter(new PostFilters($array))->get();

        return response()->json(['status' => Response::HTTP_OK, 'total_records' => $posts->count(), 'posts' => $posts], Response::HTTP_OK);
    }
}
