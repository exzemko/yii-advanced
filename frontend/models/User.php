<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $created_at
 */
class User extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'users';
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'username' => 'Username',
            'password' => 'Password',
            'created_at' => 'Created At',
        ];
    }
}
