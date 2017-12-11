<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property string $r_id
 * @property string $r_name
 * @property integer $hot_num
 * @property string $initial
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hot_num'], 'integer'],
            [['r_name'], 'string', 'max' => 50],
            [['initial'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'r_id' => 'R ID',
            'r_name' => 'R Name',
            'hot_num' => 'Hot Num',
            'initial' => 'Initial',
        ];
    }
}
