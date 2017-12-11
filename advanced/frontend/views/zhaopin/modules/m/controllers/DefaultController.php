<?php

namespace app\modules\m\controllers;

use app\modules\m\controllers\common\MbaseController;
use app\models\JobCate;
use app\models\Region;
use app\modules\m\controllers\common\MdefaultController;
/**
 * Default controller for the `m` module
 */
class DefaultController extends MbaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public $mobj=null;

    public function init(){
        parent::init();
        $this->mobj =new MdefaultController();
    }

    public function actionIndex()
    {
        $jobarr=$this->mobj ->selAll(new JobCate());
        $jobcate=$this->mobj ->child($jobarr);
        return $this->render('index',['nav'=>$jobcate]);
    }
    public function actionRegionOrder(){
        $arr=$this->mobj->region_sort(new Region());
    }
}
