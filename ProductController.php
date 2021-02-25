<?php

namespace backend\controllers;

use Yii;
use backend\models\Product;
use backend\models\Rasmlar;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\Url;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
    
/*DB da rasmlar jadvali bor. Bunda 4 ta usutun id, product_id, rasm, sana bor. Sana TIMESTAMP, CURRENT_TIMESTAMP qilingan. use backend\models\Rasmlar; use yii\web\UploadedFile; use yii\helpers\Url;*/

    public function actionMultiple()
    {
        $upload = new Rasmlar();
       
        if($upload->load(Yii::$app->request->post()))
        {
            $upload->rasm = UploadedFile::getInstances($upload, 'rasm');
            if($upload->rasm && $upload->validate())
            {
                if(!file_exists(Url::to('../../rasmlar/mahsulotlar/')))
                {
                    mkdir(Url::to('../../rasmlar/mahsulotlar/'),0777,true);
                }
                $path = Url::to('../../rasmlar/mahsulotlar/');
                foreach ($upload->rasm as $rasm) {
                    $model = new Rasmlar();

                    $model->product_id = $upload->product_id;
                    $model->rasm = time().rand(100,999).'.'.$rasm->extension;
                    if($model->save(false))
                    {
                        $rasm->saveAs($path.$model->rasm);
                    }
                }
                return $this->redirect(['index']);
            }
        }
        return $this->render('multiple', ['upload' => $upload]);
    }

    
}
