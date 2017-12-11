<?php

namespace frontend\models;

use Yii;

class Bill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 50],
            [['check'], 'string', 'max' => 5],
            [['answer1', 'answer2', 'answer3', 'answer4'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'check' => 'Check',
            'answer1' => 'Answer1',
            'answer2' => 'Answer2',
            'answer3' => 'Answer3',
            'answer4' => 'Answer4',
        ];
    }
}
