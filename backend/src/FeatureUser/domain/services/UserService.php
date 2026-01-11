<?php

namespace App\FeatureUser\domain\services;

use App\FeatureAuth\domain\events\UserLogged;
use App\FeatureUser\domain\entities\CreateUser;
use App\FeatureUser\domain\repositories\IUserRepo;
use Core\EventFlow;
use DomainException;

class UserService
{
    public function __construct(
        private IUserRepo $userRepo,
        private EventFlow $eventFlow
    ) {}

    function createUser(CreateUser $user)
    {
        if (!$this->userRepo->findByEmail($user->getEmail())) throw new DomainException("Email already exists");

        $user = $this->userRepo->save(
            $user->copy(
                password: password_hash($user['password'], PASSWORD_BCRYPT)
            )
        );

        $events = $user
            ->addEvent(new UserLogged($user->getId(), $user->getEmail()))
            ->pullEvents();

        foreach ($events as $event) {
            $this->eventFlow->emit($event);
        }
    }
}
