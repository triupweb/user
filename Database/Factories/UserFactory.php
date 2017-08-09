<?php

namespace Triup\User\Database\Factories;


use Triup\Support\Database\ModelFactory;
use Triup\User\Entities\User;

class UserFactory extends ModelFactory
{

    protected $model = User::class;

    protected function fields()
    {
        static $password;

        return [
            'name'           => $this->faker->name,
            'email'          => $this->faker->unique()->safeEmail,
            'password'       => $password ?: $password = bcrypt('secret'),
            'remember_token' => str_random(10),
        ];
    }
}