<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function errors(): array
    {
        return $this->errors;
    }

    public function validate(string $email, string $password): bool
    {
        if(Validator::email($email) === false) {
            $this->errors['email'] = 'Invalid email address';
        }

        if(Validator::password($password) === false) {
            $this->errors['password']
              = 'Password must be at least 8 characters';
        }

        return empty($this->errors);
    }

}