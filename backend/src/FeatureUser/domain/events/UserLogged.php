<?php

namespace App\FeatureAuth\domain\events;

use App\FeatureUser\interfaces\UserEvents;
use Core\AppEvents;

class UserLogged implements UserEvents
{
    public function __construct(
        readonly int $id,
        readonly string $email
    ) {}
}
