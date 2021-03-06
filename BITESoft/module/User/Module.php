<?php
namespace User;

use Zend\Mvc\MvcEvent;

use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;

use User\Auth\Adapter as AuthAdapter;

use Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session as SessionStorage;

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
    
    public function init(ModuleManager $moduleManager){
        
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        
        $sharedEvents->attach("Zend\Mvc\Controller\AbstractActionController",
                              MvcEvent::EVENT_DISPATCH, 
                              array($this, 'validateAuth'),
                              100);
    }
    
    public function validateAuth($e){
        
        $auth = new AuthenticationService;
        $auth->setStorage(new SessionStorage("User"));
        
        $controller = $e->getTarget();
        $matchedRoute = $controller->getEvent()->getRouteMatch()->getMatchedRouteName();
        
        if(!$auth->hasIdentity() and ($matchedRoute != "user-login" and $matchedRoute != "user-activate")){
            return $controller->redirect()->toRoute("user-login");
        }
        
    }
    
    public function getServiceConfig(){
        return array(
          'factories' => array(
              'User\Mail\Transport' => function($sm){
                $config = $sm->get('Config');
                
                $transport = new SmtpTransport;
                $options = new SmtpOptions($config['mail']);
                $transport->setOptions($options);
                
                return $transport;
              },
              'User\Form\User' => function($sm){
                $em = $sm->get('Doctrine\ORM\EntityManager');
                $repoRoles = $em->getRepository('Acl\Entity\Role');
                $roles = $repoRoles->fetchParent();

                return new Form\User('user', $roles);
              },
              'User\Service\User' => function($sm){
                  return new Service\User($sm->get('Doctrine\ORM\EntityManager'),
                                          $sm->get('User\Mail\Transport'),
                                          $sm->get('View'));
              },
              'User\Auth\Adapter' => function($sm){
                  return new AuthAdapter($sm->get('Doctrine\ORM\EntityManager'));
              }
          )  
        );
    }
    
    public function getViewHelperConfig(){
        
        return array(
            'invokables' => array(
                'UserIdentity' => new View\Helper\UserIdentity()
            )
        );
    }
}
