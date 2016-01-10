<?php
namespace Application\Model;

use Ouzo\Model;

/**
 * @property string login
 * @property string password
 */
class User extends Model
{
    public function __construct($attributes = [])
    {
        parent::__construct([
            'attributes' => $attributes,
            'fields' => ['login', 'password']
        ]);
    }

    public function validate()
    {
        parent::validate();
        $this->validateNotBlank($this->login, 'Login cannot be blank');
    }
}
