<?php

namespace Acl\Controller;

use Base\Controller\CrudController;
use Zend\View\Model\ViewModel;

class ResourcesController extends CrudController
{
    public function __construct() 
    {
        $this->entity       = 'Acl\Entity\Resource';
        $this->service      = 'Acl\Service\Resource';
        $this->form         = 'Acl\Form\Resource';
        $this->controller   = 'resources';
        $this->route        = 'acl-admin/default';
    }
    
    /*public function newAction()
    {
        $form = $this->getServiceLocator()->get($this->form);
        $request = $this->getRequest();

        if($request->isPost())
        {
            $form->setData($request->getPost());
            if($form->isValid())
            {
                $service = $this->getServiceLocator()->get($this->service);
                $service->insert($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }
        return new ViewModel(compact('form'));
    }
    
    public function editAction()
    {
        $form = $this->getServiceLocator()->get($this->form);
        $request = $this->getRequest();
        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if($this->params()->fromRoute('id', 0))
            $form->setData($entity->toArray());

        if($request->isPost())
        {
            $form->setData($request->getPost());

            if($form->isValid())
            {
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        return new ViewModel(compact('form'));
    }*/
}
