<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class postcontroller extends Controller{  
    public function createPost(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();
    
        Post::create($incomingFields);
        return redirect('/feedback');
    }
    public function index(){
        $posts = Post::orderBy('id', 'desc')->get();
        $total = Post::count();
        return view('admin.post.home', compact(['posts', 'total']));
    }
    public function create(){
        return view('admin.post.create');
    }
    public function showFeedbackPage()
    {
        $posts = Post::all();
        return view('feedback', ['posts' => $posts]);
    }
    public function rt(){
        return view('feedback');
    }

    public function save(Request $request){
        $validation = $request->validate([
            'title'=> 'required' ,
            'body'=> 'required' ,
            
        ]);
        $validation['title'] = strip_tags($validation['title']);

        $validation['body'] = strip_tags($validation['body']);

        $validation['user_id'] = auth()->id();
    
        $data = Post::create($validation);
        if ($data) {
            session()->flash('success', 'Post ajouté');
            return redirect(route('admin/post'));
        } else {
            session()->flash('error', 'erreur');
            return redirect(route('admin.post/create'));
        }
    }
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('admin.post.update', compact('posts'));
    }
    public function delete($id)
    {
        $posts = Post::findOrFail($id)->delete();
        if ($posts) {
            session()->flash('success', 'post Deleted Successfully');
            return redirect(route('admin/post'));
        } else {
            session()->flash('error', 'post Not Delete successfully');
            return redirect(route('admin/post/'));
        }
    }
    public function like(Post $post)
    {
        $like = Like::where('user_id', Auth::id())
                    ->where('post_id', $post->id)
                    ->first();

        if ($like) {
            // User already liked the post, so unlike it
            $like->delete();
        } else {
            // User hasn't liked the post yet, so like it
            $post->likes()->create(['user_id' => Auth::id()]);
        }

        return redirect()->back()->with('success', 'Post liked/unliked successfully.');
    }
    public function deletePost(Post $post) {
        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
        }
        return redirect('/feedback');
    }

    public function actuallyUpdatePost(Post $post, Request $request) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/feedback');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);
        return redirect('/feedback');
    }

    public function showEditScreen(Post $post) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/feedback');
        }

        return view('edit-post', ['post' => $post]);
    }

}

