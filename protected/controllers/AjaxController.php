<?php

class AjaxController extends Controller {

    public function actionLoadAmp($prov) {
        $data = CAmp::model()->findAll("prov = $prov");

        $data = CHtml::listData($data, 'code', 'name');
        echo CHtml::tag('option', array('value' => ''), CHtml::encode("-- เลือกอำเภอ --"), true);
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function actionLoadTmb($amp) {
        $data = CTmb::model()->findAll("amp = $amp");

        $data = CHtml::listData($data, 'code', 'name');
        echo CHtml::tag('option', array('value' => ''), CHtml::encode("-- เลือกตำบล --"), true);
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function actionLoadVill($tmb) {
        $data = CVill::model()->findAll("tmb = $tmb");

        $data = CHtml::listData($data, 'code', 'name');
        echo CHtml::tag('option', array('value' => ''), CHtml::encode("-- เลือกหมู่ --"), true);
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode(substr($value, 6, 2) . '-' . $name), true);
        }
    }

}

// end class
