<?php

namespace App\Http\Controllers\Mypage;

use App\Blog;
use App\Post;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $blogs = Blog::withTrashed()->withCount('posts')->whereOwnerId($user->id)->get();

        $posts = Post::withTrashed()->with('blog', 'preview')->withCount('viewcount')->whereIn('blog_id', $blogs)->paginate(10);

        return view('pages.mypage.dashboard.index', compact('blogs', 'posts'));
    }
}
