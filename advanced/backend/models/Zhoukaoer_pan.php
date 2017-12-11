<?php
	namespace backend\models;

	use yii;
	use yii\db\ActiveRecord;

	class Zhoukaoer_pan extends ActiveRecord {

		public static function tableName() {
			return "zhoukaoer_pan";
		}

		public function add($data){
			$pan = new Zhoukaoer_pan;
			$pan->timu = $data['timu'];
			$pan->daan = $data['daan'];
			return $pan->save();
		}

		public function getall() {
			$pan = new Zhoukaoer_pan;
			return $pan::find()->asarray()->all();
		}

		public function getone($id) {
			$pan = new Zhoukaoer_pan;
			return $pan::find()->where($id)->asarray()->one();
		}
	}