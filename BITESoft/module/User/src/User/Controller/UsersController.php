<?php

namespace User\Controller;

use Base\Controller\CrudController;
use Zend\View\Model\ViewModel;

class UsersController extends CrudController{
    
    public function __construct(){
        
        $this->entity = "User\Entity\User";
        $this->form = "User\Form\User";
        $this->service = "User\Service\User";
        $this->controller = "Users";
        $this->route = "user-admin";
        
    }
    
    public function newAction(){
        $form = $this->getServiceLocator()->get($this->form);
        $request = $this->getRequest();
        
        if($request->isPost()){
            $form->setData($request->getPost());
            if($form->isValid()){
                $service = $this->getServiceLocator()->get($this->service);
                $service->insert($request->getPost()->toArray());
                
                return $this->redirect()->toRoute($this->route, array('controller'=>$this->controller));
            }
        }
        
        return new ViewModel(array('form'=>$form));
    }
    
    public function editAction(){
        $form = $this->getServiceLocator()->get($this->form);
        $request = $this->getRequest();
        
        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id',0));
        
        if($this->params()->fromRoute('id',0)){
            $array = $entity->toArray();
            unset($array['password']);
            $form->setData($array);
        }
        
        if($request->isPost()){
            $form->setData($request->getPost());
            if($form->isValid()){
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());
                
                return $this->redirect()->toRoute($this->route, array('controller'=>$this->controller));
            }
        }
        
        return new ViewModel(array('form'=>$form));
    }
    
    public function deleteAction(){
        $service = $this->getServiceLocator()->get($this->service);
        if($service->delete($this->params()->fromRoute('id',0))){
            return $this->redirect()->toRoute($this->route, array('controller'=>$this->controller));
        }
    }
}
