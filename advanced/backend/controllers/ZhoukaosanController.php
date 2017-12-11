<?php

    namespace backend\controllers;

	use yii;
	use yii\web\controller;
	use backend\models\Zhoukaoer_dan;
	use backend\models\Zhoukaoer_duo;
	use backend\models\Zhoukaoer_pan;

	class ZhoukaosanController extends controller {
		public $layout = false;
		public $enableCsrfValidation = false;

		public function actionAdd() {
			return $this->render("add");
		}

		/*public function actionAdd_do() {
			$file = "D:/phpStudy2016/WWW/htdocs/YII/demo/backend/views/zhoukaosan/add.html";
			$html = file_get_contents("http://www.yiidemo.com/backend/web/index.php?r=zhoukaosan/add");
			if (!file_exists($file)) {
				file_put_contents($file, $html);
			}
		}*/

		public function actionShow() {
			$zhoukaoer_dan = new Zhoukaoer_dan;
			$zhoukaoer_duo = new Zhoukaoer_duo;
			$zhoukaoer_pan = new Zhoukaoer_pan;

			$dan = $zhoukaoer_dan->getall();
			$duo = $zhoukaoer_duo->getall();
			$pan = $zhoukaoer_pan->getall();

			return $this->render("show",['dan'=>$dan,'pan'=>$pan,'duo'=>$duo]);
		}

		public function actionShow_do() {
			
			$zhoukaoer_dan = new Zhoukaoer_dan;
			$zhoukaoer_duo = new Zhoukaoer_duo;
			$zhoukaoer_pan = new Zhoukaoer_pan;
			$post = $_POST;
			// var_dump($post);die;
			$dan_id = $post['dan_id'];
			// var_dump($dan_id);die;
			$danzheng = trim($post['danzheng']);
			$dan_da = $zhoukaoer_dan->getone($dan_id);
			// var_dump($dan_da);
			$danfen = $duofen = $panfen = 0;

			if ($dan_da['zheng'] == $danzheng) {
				$danfen = ($danfen + 5)*$dan_id;
			}

			$duo_id = $post['duo_id'];
			$duozheng = trim($post['duozheng']);
			$duo_da = $zhoukaoer_duo->getone($duo_id);
			if ($duo_da['zheng'] == $duozheng) {
				$duofen = ($duofen + 5)*$duo_id;
			}

			$pan_id = $post['pan_id'];
			$panzheng = trim($post['daan']);
			$pan_da = $zhoukaoer_pan->getone($pan_id);
			if ($pan_da['daan'] == $panzheng) {
				$panfen = ($panfen + 5)*$pan_id;
			}

			$fen = $danfen+$duofen+$panfen;

			echo "单选得分：".$danfen."分";
			echo "<br />";
			echo "多选得分：".$duofen."分";
			echo "<br />";
			echo "判断得分：".$panfen."分";
			echo "<br />";
			echo "总分：".$fen."分";
		}
	}