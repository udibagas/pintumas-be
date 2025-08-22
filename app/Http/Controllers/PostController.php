<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($request)
    {
        $data = Post::with(['user', 'comments', 'department'])
            ->when(
                $request->input('user_id'),
                fn($query) => $query->where('user_id', $request->input('user_id'))
            )
            ->when(
                $request->input('department_id'),
                fn($query) => $query->where('department_id', $request->input('department_id'))
            )
            ->when(
                $request->input('search'),
                fn($query) =>
                $query->where('title', 'ilike', '%' . $request->input('search') . '%')
            )
            ->paginate();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        Gate::authorize('create', Post::class);
        return response()->json(Post::create($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        Gate::authorize('update', $post);
        $post->update($request->validated());
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->delete();
        return response()->json(null, 204);
    }
}
