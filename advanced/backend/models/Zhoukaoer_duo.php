<?php
	namespace backend\models;

	use yii;
	use yii\db\ActiveRecord;

	class Zhoukaoer_duo extends ActiveRecord {

		public static function tableName() {
			return "zhoukaoer_duo";
		}

		public function add($data){
			$duo = new Zhoukaoer_duo;
			$duo->timu = $data['timu'];
			$duo->daan1 = $data['daan1'];
			$duo->daan2 = $data['daan2'];
			$duo->daan3 = $data['daan3'];
			$duo->daan4 = $data['daan4'];
			$duo->zheng = $data['zheng'];
			return $duo->save();
		}

		public function getall() {
			$duo = new Zhoukaoer_duo;
			return $duo::find()->asarray()->all();
		}

		public function getone($id) {
			$duo = new Zhoukaoer_duo;
			return $duo::find()->where($id)->asarray()->one();
		}
	}