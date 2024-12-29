<?php

// CommentController.php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $post->comments()->create([
            'body' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}

