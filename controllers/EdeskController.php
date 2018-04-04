<?php
/**
 * Created by PhpStorm.
 * User: edu
 * Date: 2018/3/21
 * Time: 20:48
 */

namespace app\controllers;



use yii\web\Controller;
use Yii;
use app\controllers;


class EdeskController extends BaseController
{
    public function init()
    {
        parent::init();
    }

    public function actionEdeskHome()
    {

        return $this->render("edesk-home");
    }

    public function actionInspectDevice()
    {
        try {
            if (Yii::$app->request->isAjax) {
                return 0;
            }
            set_time_limit(0);




            return 0;

        } catch (yii\base\Exception $ex) {
            Yii::error($ex->getMessage(), __METHOD__);
        }
    }

}