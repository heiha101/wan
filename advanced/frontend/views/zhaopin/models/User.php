<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $u_id
 * @property string $u_name
 * @property string $salt
 * @property string $u_pwd
 * @property string $u_tel
 * @property string $u_comment
 * @property integer $u_gender
 * @property string $u_email
 * @property integer $err_num
 * @property string $create_time
 * @property string $u_state
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_gender', 'err_num'], 'integer'],
            [['create_time'], 'safe'],
            [['u_name', 'u_pwd', 'u_email', 'u_state'], 'string', 'max' => 50],
            [['salt', 'u_comment'], 'string', 'max' => 100],
            [['u_tel'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'U ID',
            'u_name' => 'U Name',
            'salt' => 'Salt',
            'u_pwd' => 'U Pwd',
            'u_tel' => 'U Tel',
            'u_comment' => 'U Comment',
            'u_gender' => 'U Gender',
            'u_email' => 'U Email',
            'err_num' => 'Err Num',
            'create_time' => 'Create Time',
            'u_state' => 'U State',
        ];
    }
}
