<?php

namespace app\rest\v1\controllers\controllers;

use yii\web\Controller;

/**
 * Default controller for the `testid` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
