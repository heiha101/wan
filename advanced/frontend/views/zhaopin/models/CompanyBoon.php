<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_boon".
 *
 * @property integer $boon_id
 * @property integer $f_id
 * @property string $boon_name
 */
class CompanyBoon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_boon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['f_id'], 'integer'],
            [['boon_name'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'boon_id' => 'Boon ID',
            'f_id' => 'F ID',
            'boon_name' => 'Boon Name',
        ];
    }
}
