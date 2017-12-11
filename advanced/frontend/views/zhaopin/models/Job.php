<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property string $job_id
 * @property integer $job_cate_id
 * @property string $job_name
 * @property string $company
 * @property integer $salary_id
 * @property integer $is_check
 * @property string $workarea
 * @property string $welfare_id
 * @property integer $edu_id
 * @property integer $work_exp_id
 * @property integer $com_cate_id
 * @property integer $addtime
 * @property integer $expire
 * @property integer $viewed
 * @property string $job_desc
 * @property integer $u_id
 * @property integer $needs
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_cate_id', 'salary_id', 'is_check', 'edu_id', 'work_exp_id', 'com_cate_id', 'addtime', 'expire', 'viewed', 'u_id', 'needs'], 'integer'],
            [['job_desc'], 'string'],
            [['job_name', 'workarea'], 'string', 'max' => 100],
            [['company'], 'string', 'max' => 150],
            [['welfare_id'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_id' => 'Job ID',
            'job_cate_id' => 'Job Cate ID',
            'job_name' => 'Job Name',
            'company' => 'Company',
            'salary_id' => 'Salary ID',
            'is_check' => 'Is Check',
            'workarea' => 'Workarea',
            'welfare_id' => 'Welfare ID',
            'edu_id' => 'Edu ID',
            'work_exp_id' => 'Work Exp ID',
            'com_cate_id' => 'Com Cate ID',
            'addtime' => 'Addtime',
            'expire' => 'Expire',
            'viewed' => 'Viewed',
            'job_desc' => 'Job Desc',
            'u_id' => 'U ID',
            'needs' => 'Needs',
        ];
    }
}
