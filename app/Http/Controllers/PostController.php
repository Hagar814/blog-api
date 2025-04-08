<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRquest;
use App\Helpers\ApiResponse; 
use App\Http\Resource\PostResource;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Post::where('user_id', $request->user()->id)->latest()->get();
        if (count($posts) > 0) {
            return ApiResponse::sendResponse(200, 'My posts retrieved successfully', PostResource::collection($posts));
        }
        return ApiResponse::sendResponse(200, 'You don\'t have any posts', []);
    }
    



    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRquest $request)
    {
        
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $record = Post::create($data);
        if ($record) return ApiResponse::sendResponse(201, 'Your Post created successfully', new PostResource($record));
    }

    /**
     * Display the specified resource.
     */
    public function show($postId)
    {
        $post = Post::find($postId);
    
        if (!$post) {
            return ApiResponse::sendResponse(404, 'Post not found', []);
        }
    
        return ApiResponse::sendResponse(200, 'Post retrieved successfully', new PostResource($post));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRquest $request, $PostId)
    {
        $post = Post::findOrFail($PostId);
        if ($post->user_id != $request->user()->id) {
            return ApiResponse::sendResponse(403, 'You aren\'t allowed to take this action', []);
        }

        $data = $request->validated();
        $updating = $post->update($data);
        if ($updating) return ApiResponse::sendResponse(201, 'Your Post updated successfully', new PostResource($post));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
    
        if ($post->user_id != $request->user()->id) {
            return ApiResponse::sendResponse(403, 'You aren\'t allowed to take this action', []);
        }
    
        $success = $post->delete();
    
        if ($success) {
            return ApiResponse::sendResponse(200, 'Your Post deleted successfully', []);
        }
    
        return ApiResponse::sendResponse(500, 'Failed to delete the post', []);
    }
    
}
