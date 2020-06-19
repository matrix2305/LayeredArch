<?php


namespace AppCore\Entities;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Void_;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use AppCore\Entities\Post;
use Ramsey\Uuid\Uuid;

/**
 * Class Description
 * @package AppCore\Entities
 * @ORM\Entity
 * @ORM\Table (name = "description")
 */
class Description
{
    /**
     * @ORM\Id
     * @ORM\Column(name = "id", type="uuid")
     * @ORM\GeneratedValue(strategy = "CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */

    private $id;

    /**
     * @ORM\Column(name = "description", type = "string")
     * @ORM\GeneratedValue(strategy = "AUTO")
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="Post", inversedBy="description", cascade={"persist", "remove"})
     */
    private Post $post;

    public function __construct(Post $post)
    {
        $this->id = Uuid::uuid4()->toString();
        $this->post = $post;
    }

    public function setDescription($input) : void
    {
        $this->description = $input;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function getId() : string
    {
        return $this->id;
    }


}