<?php
declare(strict_types = 1);

namespace AppCore\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppCore\Entities\Description;
use Ramsey\Uuid\Doctrine\UuidGenerator;

/**
 * @ORM\Entity(repositoryClass="Infrastructure\Repository\PostsRepository")
 * @ORM\Table(name="posts")
 */
class Post
{

    /**
     * @var \Ramsey\Uuid\UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(name = "id", type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy = "CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    private string $id;

    /**
     * @ORM\Column(name = "tittle", type="string")
     */
    private string $tittle;


    /**
     * @ORM\OneToOne(targetEntity="Description", inversedBy="post", cascade={"persist", "remove"})
     */
    private Description $description;



    public function getId() : string
    {
        return $this->id;
    }

    public function getTittle() : string
    {
        return $this->tittle;
    }

    public function getText() : string
    {
        return $this->description->description;
    }

    public function setTittle(string $input){
        $this->tittle = $input;
    }

    public function setDescrition(Description $input){
        $this->description = $input;
    }


}