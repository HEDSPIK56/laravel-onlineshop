<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ExamplePost;
use App\ExampleComment;
use App\User;

class UserController extends Controller
{
    public function user_posts($id)
    {
        $posts = ExamplePost::where('author_id', $id)->where('active', 1);
        return view('pages.posts.index')->withPosts($posts);
    }

    public function user_posts_all(Request $request)
    {
        $user  = $request->user();
        $posts = ExamplePost::where('author_id', $user->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('pages.posts.index')->withPosts($posts);
    }

    public function user_posts_draft(Request $request)
    {
        $user  = $request->user();
        $posts = ExamplePost::where('author_id', $user->id)->where('active', 0)->orderBy('created_at', 'desc')->paginate(5);
        return view('pages.posts.index')->withPosts($posts);
    }

    public function profile(Request $request, $id)
    {
        $data['user'] = User::find($id);
        if (!$data['user'])
            return redirect('/');
        if ($request->user() && $data['user']->id == $request->user()->id)
        {
            $data['author'] = true;
        }
        else
        {
            $data['author'] = null;
        }
        $data['comments_count']     = $data['user']->comments->count();
        $data['posts_count']        = $data['user']->posts->count();
        $data['posts_active_count'] = $data['user']->posts->where('active', '1')->count();
        $data['posts_draft_count']  = $data['posts_count'] - $data['posts_active_count'];
        $data['latest_posts']       = $data['user']->posts->where('active', '1')->take(5);
        $data['latest_comments']    = $data['user']->comments->take(5);
        return view('admin.eshopsystem.users.profile', $data);
    }

}
