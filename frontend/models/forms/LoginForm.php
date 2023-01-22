<?php


namespace frontend\models\forms;

use frontend\models\User;
use yii\base\Model;
use Yii;


class LoginForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username'], 'trim'],
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string', 'max' => 60],
        ];
    }
    public function login() {
        if ($this->validate()) {
            $user = User::findOne(['username' => $this->username]);
            if ($user) {
                if ($user['password'] === $this->password) {

                    $_SESSION['username'] = $this->username;
                    $_SESSION['password'] = $this->password;
                    return $_SESSION;
            } return Yii::$app->session->setFlash('success', 'Пароль не верный');

            } return Yii::$app->session->setFlash('success', 'Нет такого пользователя');
        } return false;

    }


}