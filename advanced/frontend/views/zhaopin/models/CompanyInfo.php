<?php

namespace app\models;

use Yii;
use app\models\Region;
use app\models\Equity;
use app\models\Industy;

/**
 * This is the model class for table "company_info".
 *
 * @property string $f_id
 * @property integer $c_id
 * @property string $f_name
 * @property string $f_logo
 * @property string $f_tel
 * @property string $f_url
 * @property string $f_scale
 * @property string $f_site
 * @property string $f_introduce
 * @property integer $region_id
 * @property integer $e_id
 * @property string $b_id
 * @property integer $seedtime
 */
class CompanyInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'region_id', 'e_id', 'seedtime'], 'integer'],
            [['f_introduce'], 'string'],
            [['f_name', 'f_logo', 'f_url', 'f_scale', 'f_site'], 'string', 'max' => 60],
            [['f_tel'], 'string', 'max' => 11],
            [['b_id'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'f_id' => 'F ID',
            'c_id' => 'C ID',
            'f_name' => 'F Name',
            'f_logo' => 'F Logo',
            'f_tel' => 'F Tel',
            'f_url' => 'F Url',
            'f_scale' => 'F Scale',
            'f_site' => 'F Site',
            'f_introduce' => 'F Introduce',
            'region_id' => 'Region ID',
            'e_id' => 'E ID',
            'b_id' => 'B ID',
            'seedtime' => 'Seedtime',
        ];
    }
    public function getRegion(){
        return $this->hasOne(Region::className(),['r_id'=>'region_id']);
    }
    public function getEquity(){
        return $this->hasOne(Equity::className(),['e_id'=>'e_id']);
    }
    public function getIndusty(){
        return $this->hasOne(Industy::className(),['i_id'=>'b_id']);
    }
}
