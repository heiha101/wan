<?php
	namespace backend\models;

	use yii;
	use yii\db\ActiveRecord;

	class Zhoukaoer_dan extends ActiveRecord {

		public static function tableName() {
			return "zhoukaoer_dan";
		}

		public function add($data){
			$dan = new Zhoukaoer_dan;
			$dan->timu = $data['timu'];
			$dan->daan1 = $data['daan1'];
			$dan->daan2 = $data['daan2'];
			$dan->daan3 = $data['daan3'];
			$dan->daan4 = $data['daan4'];
			$dan->zheng = $data['zheng'];
			return $dan->save();
		}

		public function getall() {
			$dan = new Zhoukaoer_dan;
			return $dan::find()->asarray()->all();
		}

		public function getone($id) {
			$dan = new Zhoukaoer_dan;
			return $dan::find()->where($id)->asarray()->one();
		}
	}