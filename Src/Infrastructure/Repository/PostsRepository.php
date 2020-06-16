<?php
namespace Infrastructure\Repository;

use App\Posts;
use AppCore\Interfaces\IPostsRepository;
use Mockery\Exception;
use AppCore\Entities\Post;

class PostsRepository implements IPostsRepository
{
    public $output = array();

    public function GetAllPosts()
    {
        $posts = Posts::all();
        foreach ($posts as $spost){
            $post = new Post();
            $post->SetID($spost->id);
            $post->SetText($spost->text);
            $post->SetTittle($spost->tittle);
            $this->output[] = $post;
        }

        if(!empty($this->output)){
            return $this->output;
        }else{
            throw new Exception('Posts now found!');
        }
    }

    public function GetSinglePost($id){
        $postdata = Posts::find($id);
        $post = new Post();
        $post->SetID($postdata->id);
        $post->SetText($postdata->text);
        $post->SetTittle($postdata->tittle);
        return $post;
    }

    public function NewPost(Post $post){
        $posts = new Posts();
        $posts->tittle = $post->GetTittle();
        $posts->text = $post->GetText();
        $posts->save();
    }
}