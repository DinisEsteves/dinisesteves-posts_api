<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Post;
use App\Http\Requests\API\PostRequest;
class PostsControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostRequest $request)
    {
     $posts = Post::all();

      return response()->json([
            'status' => Response::HTTP_OK,
            'posts' => $posts
        ],Response::HTTP_OK);
    }
}
