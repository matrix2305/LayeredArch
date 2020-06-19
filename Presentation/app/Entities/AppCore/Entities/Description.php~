<?php

namespace AppCore\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description
 *
 * @ORM\Table(name="description")
 * @ORM\Entity(repositoryClass="Infrastructure\Repository\PostsRepository")
 */
class Description
{
    /**
     * @var uuid
     *
     * @ORM\Column(name="id", type="uuid", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $description;

    /**
     * @var \AppCore\Entities\Post
     *
     * @ORM\OneToOne(targetEntity="AppCore\Entities\Post", inversedBy="description", cascade={"persist","remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="description_id", referencedColumnName="id", unique=true)
     * })
     */
    private $post;


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
     * Set description.
     *
     * @param string $description
     *
     * @return Description
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set post.
     *
     * @param \AppCore\Entities\Post|null $post
     *
     * @return Description
     */
    public function setPost(\AppCore\Entities\Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post.
     *
     * @return \AppCore\Entities\Post|null
     */
    public function getPost()
    {
        return $this->post;
    }
}
