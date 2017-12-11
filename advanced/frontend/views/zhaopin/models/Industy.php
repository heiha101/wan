<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "industy".
 *
 * @property string $i_id
 * @property string $i_name
 */
class Industy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'industy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['i_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'i_id' => 'I ID',
            'i_name' => 'I Name',
        ];
    }
}
