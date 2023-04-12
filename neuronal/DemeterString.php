<?php

class RegisterUserHandler
{
    private $container;
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;    
    }
    
    public function handle($name, $email)
    {
        $user = new User($email, $name);
        $this->getContainer('orm')->persist($user)->flush();
        $this->getContainer('notification_service')->getEmailService()->sendWelcomeEmail($user->getId());
    }
    
    private getContainer()
    {
        return $this->container;
    }
}
