<?php
declare(strict_types = 1);

namespace AppCore\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppCore\Entities\Description;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\Uuid;


/**
 * @ORM\Entity
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
    private $id;

    /**
     * @ORM\Column(name = "tittle", type="string")
     */
    private $tittle;


    /**
     * @ORM\OneToOne(targetEntity="Description", mappedBy="post", cascade={"persist", "remove"})
     */
    private $description;

    /**
     * @ORM\Column(name = "description_id", type="string")
     */

    private $descriptionId;

    public function __construct()
    {
        $this->id = Uuid::uuid4()->toString();
    }

    public function getId()
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

    public function setTittle($input){
        $this->tittle = $input;
    }

    public function setDescrition(Description $input){
        $this->description = $input;
        $this->descriptionId = $this->description->getId();
    }


}