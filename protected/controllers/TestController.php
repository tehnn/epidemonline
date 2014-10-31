<?php

class TestController extends Controller {

    public function actionTestView() {

        //$this->render('popup');
        //$model = new CActiveDataProvider('User');
        $ob1 = new CArrayDataProvider('User');
        $ob2 = new User;


        echo "<pre>";       
       
        
        CVarDumper::dump($ob1);

        echo "<hr>";

        CVarDumper::dump($ob2);
    }

    function actionPaginat() {
        $criteria = new CDbCriteria();
        $count = CDisease::model()->count($criteria); // นำจำนวนเรคคอร์ดทั้งหมดใน Table
        $pages = new CPagination($count);
        $pages->pageSize = 10; // กำหนดจำนวนเรคอร์ดต่อ 1 หน้า
        $pages->applyLimit($criteria);
        $sort = new CSort('CDisease');
        $sort->attributes = array(
            'code', 'disease'
        );
        $sort->applyOrder($criteria); //กำหนดการจัดเรียง
        $model = CDisease::model()->findAll($criteria);
        $this->render('paginat', array(
            'model' => $model,
            'pages' => $pages,
            'sort' => $sort,
        ));
        // หมายเหตุ : ใน model CDisease ประกอบด้วย ฟิลด์ code,disease
    }

    public function actionUpload() {
        $dir = 'upload';
        if (count($_FILES) > 0) { // ถ้ามีการ เลือกไฟล์  
            $file = CUploadedFile::getInstancesByName('Upload');
            foreach ($file as $f) {
                $model_file = new CFile();
                $info[] = $f->name;   // ทดสอบส่งชื่อไฟล์ไปที่ view   
                $new_name = iconv('UTF-8', 'TIS-620', $f->getName());
                if ($f->saveAs("$dir/$new_name")) {
                    //โฟร์เดอร์ upload อยู่ระดับเดียวกับ proteced  
                    // iconv แก้ปัญหาเรื่องไฟล์มีชื่อภาษาไทย
                    //$model_file->name = $f->filename;
                    //$model_file->size = $f->size . " b";
                    //$model_file->uploaddate = date("Y-m-d H:i:s");
                    //$model_file->save();
                }//..end if                
            }//..end foreach            
        }
        $this->render('v_upload', array(
            'info' => $info
        ));
    }

// ..end actionupload

    public function actionChart() {

        $sql = "select * from (SELECT concat('(',d.code,')',d.disease) as disease,count(e.disease) as total FROM Epe0 e 
           
            left join c_disease  d on d.code = e.disease 
            where e.disease in (select code from c_disease)            
            group by disease) tb 
            
            order by total DESC limit 10";

        //$sql = "select * from (SELECT e.disease,count(e.disease) as total FROM Epe0 e where e.disease in (select code from c_disease)group by e.disease) tb     order by total DESC limit 10";


        $dataReader = Yii::app()->db->createCommand($sql)->queryAll();

        $data = new CArrayDataProvider($dataReader, array(
        ));



        $this->render('v_chart', array('data' => $data));
    }

    public function actionTest1($id = null) {



        $this->render('v_test1', array('id' => $id));
    }

    public function actionBt($id = null) {

        $this->render('v_bt', array('id' => $id));
    }

    public function actionLoad($id = null) {
        echo CJSON::encode($id);
        Yii::app()->end();
    }

}

