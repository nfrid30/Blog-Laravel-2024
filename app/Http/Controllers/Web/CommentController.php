<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request): RedirectResponse
    {
        Comment::query()->create($request->validated());
        return back();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment): JsonResponse
    {
        Gate::authorize('owner', $comment);
        $comment->update($request->validated());
        return response()->json(['status' => 'success']);
    }

    public function destroy(Comment $comment): JsonResponse
    {
        Gate::authorize('owner', $comment);
        $comment->delete();
        return response()->json(['status' => 'success']);
    }
}
