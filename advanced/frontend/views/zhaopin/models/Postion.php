<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "postion".
 *
 * @property integer $postion_id
 * @property string $postion
 * @property string $postion_name
 * @property string $sector
 * @property string $nature
 * @property integer $range
 * @property integer $background
 * @property string $requirements
 * @property string $temptation
 * @property string $address
 * @property integer $c_id
 * @property integer $state
 * @property string $img
 */
class Postion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'postion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['range', 'background', 'c_id', 'state'], 'integer'],
            [['postion', 'postion_name', 'sector', 'requirements', 'temptation'], 'string', 'max' => 30],
            [['nature'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 60],
            [['img'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'postion_id' => 'Postion ID',
            'postion' => 'Postion',
            'postion_name' => 'Postion Name',
            'sector' => 'Sector',
            'nature' => 'Nature',
            'range' => 'Range',
            'background' => 'Background',
            'requirements' => 'Requirements',
            'temptation' => 'Temptation',
            'address' => 'Address',
            'c_id' => 'C ID',
            'state' => 'State',
            'img' => 'Img',
        ];
    }
}
