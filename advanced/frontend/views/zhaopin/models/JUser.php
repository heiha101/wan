<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "j_user".
 *
 * @property integer $j_id
 * @property string $j_name
 * @property string $j_academic
 * @property string $j_year
 * @property string $j_sex
 * @property string $j_photo
 * @property string $j_email
 * @property string $j_state
 * @property string $j_img
 * @property integer $p_id
 */
class JUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'j_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_id'], 'integer'],
            [['j_name', 'j_academic', 'j_year', 'j_sex', 'j_photo', 'j_email', 'j_img'], 'string', 'max' => 30],
            [['j_state'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'j_id' => 'J ID',
            'j_name' => 'J Name',
            'j_academic' => 'J Academic',
            'j_year' => 'J Year',
            'j_sex' => 'J Sex',
            'j_photo' => 'J Photo',
            'j_email' => 'J Email',
            'j_state' => 'J State',
            'j_img' => 'J Img',
            'p_id' => 'P ID',
        ];
    }
}
