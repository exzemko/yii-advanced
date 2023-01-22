<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Book extends ActiveRecord
{

    public static function tableName()
    {
        return '{{books}}';
    }

    public function rules()
    {
        return [
            [['title', 'author'], 'required'],
            [['title', 'author'], 'string', 'max' => 66],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'created_at' => 'Created At',
        ];
    }
}
