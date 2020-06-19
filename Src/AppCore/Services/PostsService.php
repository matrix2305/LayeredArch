<?php
namespace AppCore\Services;

use AppCore\DTO\PostDTO;
use AppCore\Entities\Post;
use AppCore\Interfaces\ILog;
use AppCore\Interfaces\IPostsRepository;
use AppCore\Interfaces\IPostsService;
use Mockery\Exception;
use AppCore\Entities\Description;

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
        try {
            $post = new Post();
            $post->setTittle($tittle);

            $description = new Description($post);
            $description->setDescription($text);
            $post->setDescrition($description);

            $this->PostRepository->NewPost($post, $description);
        }catch (Exception $exception){
            $this->Log->AddLog($exception->getMessage());
            return $exception->getMessage();
        }
    }

    public function GetSinglePost($id){
        try {
            $GetOnePost = $this->PostRepository->GetSinglePost($id);
            $PostDTO = new PostDTO($GetOnePost);
            return $PostDTO;
        }catch (Exception $exception){
            $this->Log->AddLog($exception->getMessage());
            return $exception->getMessage();
        }
    }
}