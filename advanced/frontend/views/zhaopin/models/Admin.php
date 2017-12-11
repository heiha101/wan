<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $adm_id
 * @property string $adm_name
 * @property string $adm_pwd
 * @property integer $adm_key
 * @property integer $photo
 * @property string $email
 * @property integer $sex
 * @property string $nikename
 * @property integer $study
 * @property string $img
 * @property string $adm_createtime
 * @property string $mobile
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['adm_key', 'photo', 'sex', 'study'], 'integer'],
            [['adm_createtime'], 'safe'],
            [['adm_name'], 'string', 'max' => 30],
            [['adm_pwd', 'img', 'mobile'], 'string', 'max' => 50],
            [['email', 'nikename'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'adm_id' => 'Adm ID',
            'adm_name' => 'Adm Name',
            'adm_pwd' => 'Adm Pwd',
            'adm_key' => 'Adm Key',
            'photo' => 'Photo',
            'email' => 'Email',
            'sex' => 'Sex',
            'nikename' => 'Nikename',
            'study' => 'Study',
            'img' => 'Img',
            'adm_createtime' => 'Adm Createtime',
            'mobile' => 'Mobile',
        ];
    }
}
