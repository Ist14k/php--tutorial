<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function __construct(public array $attributes)
    {
        if(Validator::email($attributes['email']) === false) {
            $this->errors['email'] = 'Invalid email address';
        }

        if(Validator::password($attributes['password']) === false) {
            $this->errors['password']
              = 'Password must be at least 8 characters';
        }
    }

    /**
     * @throws \Core\ValidationException
     */
    public static function validate($attributes): self
    {
        $instance = new static($attributes);

        if( ! $instance->failed()) {
            $instance->throw();
        }

        return $instance;
    }

    /**
     * @throws \Core\ValidationException
     */
    public function throw(): void
    {
        ValidationException::throw(
          $this->errors(),
          $this->attributes
        );
    }

    public function failed(): bool
    {
        return empty($this->errors);
    }

    public function addError(string $key, string $message)
    {
        $this->errors[$key] = $message;
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error($key, $message): self
    {
        $this->errors[$key] = $message;

        return $this;
    }
}