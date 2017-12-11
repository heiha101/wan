<?php

namespace frontend\models;

use Yii;

class Many extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'many';
    }

    /**
     * @inheritdoc
     */
//    public function rules()
//    {
//        return [
//            [['title', 'answer1', 'answer2', 'answer3', 'answer4'], 'string', 'max' => 20],
//            [['check'], 'string', 'max' => 10],
//        ];
//    }

    /**
     * @inheritdoc
     */
//    public function attributeLabels()
//    {
//        return [
//            'id' => 'ID',
//            'title' => 'Title',
//            'check' => 'Check',
//            'answer1' => 'Answer1',
//            'answer2' => 'Answer2',
//            'answer3' => 'Answer3',
//            'answer4' => 'Answer4',
//        ];
//    }
}
