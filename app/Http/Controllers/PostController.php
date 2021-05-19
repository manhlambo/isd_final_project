<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.post.index', ['posts' => $posts]);
    }

    public function create(){
        return view ('admin.post.create');
    }

    public function store(){
        $data = request()->validate([
            'title' => 'required | max:255',
            'content' => 'required',
            'file' => 'file',
        ], [
            'title.required' => 'Vui lòng điền thông tin',
            'title.max:255' => 'Tiêu đề vượt quá ký tự cho phép',
            'content.required' => 'Vui lòng điền thông tin'
        ]);

        auth()->user()->posts()->create($data);

        Session::flash('post-created-message', 'Thông báo đã được thêm thành công');
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post){
        $post->delete();

        Session::flash('message', 'Thông báo đã được xóa thành công');
        return back();
    }

    public function edit(Post $post){
        return view('admin.post.edit', ['post'=>$post]);
    }

    public function update(Post $post){
        $data = request()->validate([
            'title' => 'required | max:255',
            'content' => 'required',
            'file' => 'file',
        ], [
            'title.required' => 'Vui lòng điền thông tin',
            'title.max:255' => 'Tiêu đề vượt quá ký tự cho phép',
            'content.required' => 'Vui lòng điền thông tin'
        ]);

        auth()->user()->posts()->update($data);

        Session::flash('post-updated-message', 'Thông báo đã được cập nhật thành công');
        return redirect()->route('posts.index');
    }
    
    public function show(Post $post){

        return view('announcement', [
            'post' => $post,
        ]);
    }
}
