<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seedtime".
 *
 * @property string $seedtime_id
 * @property string $seedtime_name
 */
class Seedtime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seedtime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seedtime_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'seedtime_id' => 'Seedtime ID',
            'seedtime_name' => 'Seedtime Name',
        ];
    }
}
