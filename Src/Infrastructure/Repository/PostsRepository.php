<?php
namespace Infrastructure\Repository;

use AppCore\Entities\Post;
use Doctrine\ORM\EntityManager;
use AppCore\Interfaces\IPostsRepository;
use AppCore\Entities\Description;

class PostsRepository implements IPostsRepository
{

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function GetAllPosts()
    {
        return $this->em->getRepository(Post::class)->findAll();
    }

    public function GetSinglePost($id){
        return $this->em->getRepository(Post::class)->findOneBy([
            'id' => $id
        ]);
    }

    public function NewPost(Post $post, Description $description){
        $this->em->persist($description);
        $this->em->persist($post);
        $this->em->flush();
    }
}