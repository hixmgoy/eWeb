<?php

/**
 * Created by PhpStorm.
 * User: edu
 * Date: 2018/3/21
 * Time: 20:55
 */

namespace app\rest\v1\controllers;

use yii;
use app\rest\common\controllers\BaseController;
use yii\web\Controller;
class EdeskController extends Controller
{
    public function init()
    {
        parent::init();
    }

    public function actionInspectDevice($host="192.168.32.56", $user="ruijie", $pwd="ruijie", $cmd="show exception")
    {
        try {
            $output = "";
            exec('/usr/bin/python /project/www/eDesk/views/edesk/test.py '.$host .' '.$user. ' '.$pwd. ' "'. $cmd.'"',$output);
            $output = json_encode($output);
            return $output;

        } catch (yii\base\Exception $ex) {
            Yii::error($ex->getMessage(), __METHOD__);
        }
    }

}