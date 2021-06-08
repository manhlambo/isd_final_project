<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::select('*')->orderBy('updated_at', 'desc')->paginate(3);
        
        return view('home', [
            'posts' => $posts
        ]);
    }
}
