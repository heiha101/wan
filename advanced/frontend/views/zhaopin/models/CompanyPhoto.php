<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_photo".
 *
 * @property integer $f_id
 * @property string $f_photo
 */
class CompanyPhoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['f_id'], 'required'],
            [['f_id'], 'integer'],
            [['f_photo'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'f_id' => 'F ID',
            'f_photo' => 'F Photo',
        ];
    }
}
