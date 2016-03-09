<?php

namespace Acl\Service;

use Base\Service\AbstractService;
use Zend\Stdlib\Hydrator;
use Doctrine\ORM\EntityManager;

class Role extends AbstractService 
{
    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Acl\Entity\Role';
    }
    
    public function insert(array $data)
    {
        $entity = new $this->entity($data);
        
        if($data['parent'])
        {
            $parent = $this->em->getReference($this->entity, $data['parent']);
            $entity->setParent($parent);
        }
        else{$entity->setParent(null);}
        
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
    
    public function update(array $data)
    {
        $entity = $this->em->getReference($this->entity, $data['id']);
        (new Hydrator\ClassMethods())->hydrate($data, $entity);
        
        if($data['parent'])
        {
            $parent = $this->em->getReference($this->entity, $data['parent']);
            $entity->setParent($parent);
        }
        else{$entity->setParent(null);}

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
}
