<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job_cate".
 *
 * @property integer $job_cate_id
 * @property string $job_cate_name
 * @property integer $parent_id
 * @property integer $job_cate_sort
 */
class JobCate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_cate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'job_cate_sort'], 'integer'],
            [['job_cate_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_cate_id' => 'Job Cate ID',
            'job_cate_name' => 'Job Cate Name',
            'parent_id' => 'Parent ID',
            'job_cate_sort' => 'Job Cate Sort',
        ];
    }
}
