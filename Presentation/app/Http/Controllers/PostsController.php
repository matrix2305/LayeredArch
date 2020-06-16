<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AppCore\Interfaces\IPostsService;

class PostsController extends Controller
{
    private $PostsService;

    public function __construct(IPostsService $postsService)
    {
        $this->PostsService = $postsService;
    }

    public function GetAllPosts(){
        $posts = $this->PostsService->GetAllPosts();
        return view('posts', ['posts' => $posts]);
    }


    public function CreatePost(){
        return view('create');
    }

    public function NewPost(){
        request()->validate([
                'tittle'=>'required',
                'text'=>'required'
            ]
        );

        $tittle = request('tittle');
        $text = request('text');

        $this->PostsService->NewPost($tittle, $text);

        return redirect('/');
    }


    public function GetSinglePost($id){
        $post = $this->PostsService->GetSinglePost($id);
        return view('onepost', ['post' => $post]);
    }
}
