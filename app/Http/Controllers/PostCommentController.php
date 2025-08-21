<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostComment;

class PostCommentController extends Controller
{
    public function store(Request $request, $slug)
    {
        $this->validate($request, [
            'comment' => 'required|string|max:1000',
        ]);

        $comment = PostComment::create([
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
            'comment' => $request->comment,
        ]);

        if ($comment) {
            request()->session()->flash('success', 'Comment submitted successfully!');
        } else {
            request()->session()->flash('error', 'Failed to submit comment. Please try again.');
        }

        return redirect()->back();
    }

    public static function getAllUserComments()
    {
        return PostComment::with(['user'])->where('user_id', auth()->user()->id)->paginate(10);
    }
} 