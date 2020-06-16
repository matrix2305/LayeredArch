<?php
namespace AppCore\Services;

use AppCore\DTO\PostDTO;
use AppCore\Entities\Post;
use AppCore\Interfaces\ILog;
use AppCore\Interfaces\IPostsRepository;
use AppCore\Interfaces\IPostsService;
use Mockery\Exception;

class PostsService implements IPostsService
{
    public $output = array();
    private $Log, $PostRepository;

    public function __construct(IPostsRepository $postsRepository, ILog $log)
    {
        $this->PostRepository = $postsRepository;
        $this->Log = $log;
    }

    public function GetAllPosts(){
        try {
            $GetPosts = $this->PostRepository->GetAllPosts();
            foreach ($GetPosts as $post){
                $PostDTO = new PostDTO($post);
                $this->output[] = $PostDTO;
            }
            return $this->output;
        }catch (Exception $exception){
            $this->Log->AddLog($exception->getMessage());
            return $exception->getMessage();
        }
    }

    public function NewPost($tittle, $text){
        $post = new Post();
        $post->SetTittle($tittle);
        $post->SetText($text);
        $this->PostRepository->NewPost($post);
    }

    public function GetSinglePost($id){
        $GetOnePost = $this->PostRepository->GetSinglePost($id);
        $PostDTO = new PostDTO($GetOnePost);
        return $PostDTO;
    }
}