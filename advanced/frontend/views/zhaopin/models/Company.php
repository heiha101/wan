<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "company".
 *
 * @property string $c_id
 * @property string $c_name
 * @property string $c_pwd
 * @property string $c_salf
 * @property string $c_email
 * @property string $c_tel
 * @property string $c_settime
 * @property string $c_uptime
 * @property integer $status
 * @property string $c_logintime
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_name', 'c_pwd', 'c_email', 'c_tel'], 'required'],
            [['c_settime', 'c_uptime', 'c_logintime'], 'safe'],
            [['status'], 'integer'],
            [['c_name', 'c_pwd', 'c_email'], 'string', 'max' => 60],
            [['c_salf'], 'string', 'max' => 16],
            [['c_tel'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'c_name' => 'C Name',
            'c_pwd' => 'C Pwd',
            'c_salf' => 'C Salf',
            'c_email' => 'C Email',
            'c_tel' => 'C Tel',
            'c_settime' => 'C Settime',
            'c_uptime' => 'C Uptime',
            'status' => 'Status',
            'c_logintime' => 'C Logintime',
        ];
    }


}
