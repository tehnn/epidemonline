<?php

class TestExcelController extends Controller {

    public function actionGrid() {
        $model = new CProv('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['CProv'])) {
            $model->attributes = $_GET['CProv'];
        }
        if (isset($_GET['export'])) {
            $production = 'export';
        } else {
            $production = 'grid';
        }

        $this->render('view_grid', array(
            'model' => $model,
            'production' => $production
        ));
    }
    
    
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cprov-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

