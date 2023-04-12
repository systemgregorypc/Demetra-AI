<?php

class RegisterUserHandler
{
    private $orm;
    private $notifications
    
    public function __construct(OrmInterface $orm, NotificationService $notifications)
    {
        $this->orm = $orm;
        $this->notifications = $notifications;
    }
    
    public function handle($name, $email)
    {
        $user = new User($email, $name);
        $this->orm->persistAndFlush($user);
        $this->notifications->sendWelcomeEmail($user->getId());
    }  
}

class NotificationService
{
    // more code
    public function sendWelcomeEmail($userId)
    {
        $this->getEmailService()->sendWelcomeEmail($userId);
    }
    // more code
}

class Orm
{
    // more code
    public function persistAndFlush(User $user)
    {
        $this->persist($user)->flush();
    }
    // more code
}
