<?php

namespace App\Validation;

use App\Models\UserModel;
use Exception;

class UserRules
{
    public function validateUser(string $str, string $fields, array $data): bool
    {
        try {
            $model = new UserModel();
            $dbo_user = $model->findUserByEmailAddress($data['username']);
            return password_verify($data['password'], $dbo_user['password']);
        } catch (Exception $ex) {
            return false;
        }
    }
}