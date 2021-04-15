<?php

namespace App\GraphQL;

use DMo\Colja\GraphQL\AbstractEntityResolver;
use App\Entity\ColjaEntity;

class DemoEntityResolver extends AbstractEntityResolver
{
    protected function structure($entity): array
    {
        return [
            'id' => $entity->getId(),
            'name' => $entity->getName()
        ];
    }

    protected function getEntityClassname(): string
    {
        return ColjaEntity::class;
    }

    public function getColjaEntity(array $root = null, array $args): array
    {
        $entity = new ColjaEntity('The name!');
        return $this->structure($entity);
    }
}
