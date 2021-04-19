<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ColjaEntity
{
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
     * @var ColjaWeakEntity[]
     * @ORM\OneToMany(targetEntity="ColjaWeakEntity", mappedBy="parent")
     */
    private $children = [];

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->id = sha1(microtime());
        $this->name = $name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param ColjaWeakEntity $entity
     * @return ColjaEntity
     */
    public function addChild(ColjaWeakEntity $entity)
    {
        $this->children[] = $entity;
        return $this;
    }

    /**
     * @return ColjaWeakEntity[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }
}
