<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equity".
 *
 * @property string $e_id
 * @property string $e_stage
 */
class Equity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['e_stage'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'e_id' => 'E ID',
            'e_stage' => 'E Stage',
        ];
    }
}
