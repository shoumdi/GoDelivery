<?php
namespace App\FeatureUser\infrastructure\persistence;

use App\dao\UserDao;
use App\Domain\User\Entities\User;
use App\FeatureUser\domain\entities\CreateUser;
use App\FeatureUser\domain\repositories\IUserRepo;
use App\FeatureUser\infrastructure\mappers\InfraMapper;

class UserRepo implements IUserRepo {
    private UserDao $userDao;
    public function __construct(UserDao $userDao)
    {
        $this->userDao = $userDao;
    }
    public function save(CreateUser $user):?User
    {
        $entity = $this->userDao->insert(InfraMapper::toUser($user));
        if (!$entity) return null;
        return Mapper::fromUserEntity($entity);
    }
    public function findById(int $id): ?User
    {
        throw new \Exception('Not implemented');
    }
    
    public function findByEmail(string $email): ?User
    {
        throw new \Exception('Not implemented');
    }

    public function findRoleByName(string $role): ?Role
    {
        throw new \Exception('Not implemented');
    }
}