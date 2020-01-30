<?php

namespace common\modules\task\controllers;

use yii\web\Controller;
use common\modules\models\TaskStatus;
use common\modules\models\TaskProject;

/**
 * Default controller for the `task` module
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

    public function
}
