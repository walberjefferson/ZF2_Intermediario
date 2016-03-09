<?php

namespace Acl;

use Zend\Mvc\MvcEvent;

use Zend\ModuleManager\ModuleManager;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Acl\Form\Role' => function($sm){
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $repo = $em->getRepository('Acl\Entity\Role');
                    $parent = $repo->fetchParent();
                    
                    return new Form\Role('role', $parent);
                },
                'Acl\Form\Privilege' => function($sm){
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $repoRoles = $em->getRepository('Acl\Entity\Role');
                    $roles = $repoRoles->fetchParent();

                    $repoResources = $em->getRepository('Acl\Entity\Resource');
                    $resources = $repoResources->fetchPairs();

                    return new Form\Privilege('privilege', $roles, $resources);
                },
                'Acl\Service\Role' => function($sm){
                    return new Service\Role($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Acl\Service\Resource' => function($sm){
                    return new Service\Resource($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Acl\Service\Privilege' => function($sm){
                    return new Service\Privilege($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Acl\Permissions\Acl' => function($sm){
                    $em = $sm->get('Doctrine\ORM\EntityManager');

                    $repoRole = $em->getRepository('Acl\Entity\Role');
                    $roles = $repoRole->findAll();

                    $repoResources = $em->getRepository('Acl\Entity\Resource');
                    $resources = $repoResources->findAll();

                    $repoPrivileges = $em->getRepository('Acl\Entity\Privilege');
                    $privileges = $repoPrivileges->findAll();

                    return new Permissions\Acl($roles, $resources, $privileges);
                }
            )
        );
    }
}
