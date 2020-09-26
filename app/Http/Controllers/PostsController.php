<?php


namespace App\Http\Controllers;


use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function storePost(StorePostRequest $request)
    {
        // Make request php artisan make:request RequestName
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return response()->json(['msg' => 'Post created successfully.']);
    }

    public function get()
    {
        return Post::all();
    }
}
