<?php

namespace AppCore\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="posts")
 * @ORM\Entity(repositoryClass="Infrastructure\Repository\PostsRepository")
 */
class Post
{
    /**
     * @var uuid
     *
     * @ORM\Column(name="id", type="uuid", precision=0, scale=0, nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tittle", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $tittle;

    /**
     * @var \AppCore\Entities\Description
     *
     * @ORM\OneToOne(targetEntity="AppCore\Entities\Description", mappedBy="post", cascade={"persist","remove"})
     */
    private $description;


    /**
     * Get id.
     *
     * @return uuid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tittle.
     *
     * @param string $tittle
     *
     * @return Post
     */
    public function setTittle($tittle)
    {
        $this->tittle = $tittle;

        return $this;
    }

    /**
     * Get tittle.
     *
     * @return string
     */
    public function getTittle()
    {
        return $this->tittle;
    }

    /**
     * Set description.
     *
     * @param \AppCore\Entities\Description|null $description
     *
     * @return Post
     */
    public function setDescription(\AppCore\Entities\Description $description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return \AppCore\Entities\Description|null
     */
    public function getDescription()
    {
        return $this->description;
    }
}
