<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logo".
 *
 * @property integer $id
 * @property integer $comp_id
 * @property string $comp_name
 * @property string $comp_tel
 * @property string $comp_img
 * @property string $comp_money
 * @property integer $comp_status
 * @property string $comp_settime
 * @property integer $comp_settime_month
 */
class Logo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'logo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comp_id', 'comp_status', 'comp_settime_month'], 'integer'],
            [['comp_settime'], 'safe'],
            [['comp_name'], 'string', 'max' => 60],
            [['comp_tel'], 'string', 'max' => 20],
            [['comp_img'], 'string', 'max' => 30],
            [['comp_money'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comp_id' => 'Comp ID',
            'comp_name' => 'Comp Name',
            'comp_tel' => 'Comp Tel',
            'comp_img' => 'Comp Img',
            'comp_money' => 'Comp Money',
            'comp_status' => 'Comp Status',
            'comp_settime' => 'Comp Settime',
            'comp_settime_month' => 'Comp Settime Month',
        ];
    }
}
