<?php

namespace App\Extensions;

use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class SessionUserProvider implements UserProvider {

    public function retrieveById($identifier)
    {
        $session = session();
        if($identifier != $session->get('user.id')) {
            throw new \InvalidArgumentException('Authentication ID does not match ID saved in session.');
        }
        return (new User())->fill([
            'id' => $session->get('user.id'),
            'name' => $session->get('user.name'),
            'email' => $session->get('user.email')
        ]);
    }

    /**
     * @inheritDoc
     */
    public function retrieveByToken($identifier, $token)
    {
        throw BadMethodCallException();
    }

    /**
     * @inheritDoc
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        throw BadMethodCallException();
    }

    /**
     * @inheritDoc
     */
    public function retrieveByCredentials(array $credentials)
    {
        throw BadMethodCallException();
    }

    /**
     * @inheritDoc
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        throw BadMethodCallException();
    }
}
