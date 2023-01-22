<?php

namespace frontend\models\forms;

use yii\base\Model;
use frontend\models\User;
use Yii;

class SignupForm extends Model
{
    public $name;
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'name'], 'trim'],
            [['username', 'password'], 'required'],
            [['name', 'username', 'password'], 'string', 'max' => 60],
            [['username'], 'unique', 'targetClass' => '\frontend\models\User']
        ];
    }

    public function save () {
        if ($this->validate()) {
            $user = new User;
            $user->name = $this->name;
            $user->username = $this->username;
            $user->password = $this->password;


            return $user->save();
        }
        return false;

    }



}