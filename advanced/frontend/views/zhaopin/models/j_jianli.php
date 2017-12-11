<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "j_jianli".
 *
 * @property integer $l_id
 * @property string $q_gong
 * @property string $q_zhi
 * @property string $q_state
 * @property string $q_xin
 * @property string $g_name
 * @property string $g_zhi
 * @property string $g_kai
 * @property string $g_jie
 * @property string $j_class
 * @property string $j_xueli
 * @property string $j_zhuan
 * @property string $z_wo
 * @property string $z_show
 * @property string $z_centent
 * @property integer $j_id
 */
class j_jianli extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'j_jianli';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['j_id'], 'integer'],
            [['q_gong', 'q_zhi', 'q_state', 'q_xin', 'g_name', 'g_zhi', 'g_kai', 'g_jie', 'j_class', 'j_xueli', 'j_zhuan', 'z_show', 'z_centent'], 'string', 'max' => 30],
            [['z_wo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'l_id' => 'L ID',
            'q_gong' => 'Q Gong',
            'q_zhi' => 'Q Zhi',
            'q_state' => 'Q State',
            'q_xin' => 'Q Xin',
            'g_name' => 'G Name',
            'g_zhi' => 'G Zhi',
            'g_kai' => 'G Kai',
            'g_jie' => 'G Jie',
            'j_class' => 'J Class',
            'j_xueli' => 'J Xueli',
            'j_zhuan' => 'J Zhuan',
            'z_wo' => 'Z Wo',
            'z_show' => 'Z Show',
            'z_centent' => 'Z Centent',
            'j_id' => 'J ID',
        ];
    }

}
