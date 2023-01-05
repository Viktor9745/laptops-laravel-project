<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Laptop;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'content' =>'required',
            'laptop_id'=>'required|numeric|exists:laptops,id'
        ]);
        Auth::user()->comments()->create($validated);
        return back()->with('message', 'Comment created successfully!');
    }
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);
        $comment->update([
            'content'=>$request->input('content'),
            'laptop_id' => $request->laptop_id,

        ]);

        return redirect()->back();
    }
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return back()->with('message', 'Comment deleted successfully!');
    }
}
