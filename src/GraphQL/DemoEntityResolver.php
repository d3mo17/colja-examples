<?php

namespace App\GraphQL;

use DMo\Colja\GraphQL\AbstractEntityResolver;
use App\Entity\ColjaEntity;
use App\Entity\ColjaWeakEntity;

class DemoEntityResolver extends AbstractEntityResolver
{
    protected function structure($entity): array
    {
        return [
            'id' => $entity->getId(),
            'name' => $entity->getName(),
            'children' => function(array $root = null, array $args) use ($entity) {
                $excludes = empty($args['exclude']) ? [] : $args['exclude'];
                $children = $entity->getChildren();
                $result = [];
                foreach ($children as $child) {
                    if (!in_array($child->getName(), $excludes)) {
                        $result[] = [
                            'id' => $child->getId(),
                            'name' => $child->getName(),
                            'parent' => function() use ($child) {
                                return $this->structure($child->getParent());
                            }
                        ];
                    }
                }

                return $result;
            }
        ];
    }

    protected function getEntityClassname(): string
    {
        return ColjaEntity::class;
    }

    public function getColjaEntity(array $root = null, array $args): array
    {
        $entity = new ColjaEntity('The name!');
        new ColjaWeakEntity($entity, 'Name of first child');
        new ColjaWeakEntity($entity, 'Name of second child');
        new ColjaWeakEntity($entity, 'Name of third child');
        new ColjaWeakEntity($entity, 'Name of 4th child');
        new ColjaWeakEntity($entity, 'Name of 5th child');
        return $this->structure($entity);
    }
}
