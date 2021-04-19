<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ColjaWeakEntity
{
    /**
     * @var ColjaEntity
     * @ORM\ManyToOne(targetEntity="ColjaEntity", inversedBy="children")
     */
    private $parent;

    /**
     * @var string
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @param ColjaEntity $parent
     * @param string $name
     */
    public function __construct(ColjaEntity $parent, string $name)
    {
        $this->id = sha1(microtime());
        $this->name = $name;
        $parent->addChild($this);
        $this->parent = $parent;
    }

    public function getParent(): ColjaEntity
    {
        return $this->parent;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
