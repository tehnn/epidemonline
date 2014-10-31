<?php

class Epe0Controller extends Controller {

    public $layout = '//layouts/main';

//public $layout = '';

    public function filters() {
        return array(
            'accessControl',
        );
    }

    /*
      public function accessRules() {
      return array(
      array('allow', // allow all users to perform these actions
      'actions' => array('index', 'view', 'ampadmin'),
      'users' => array('*'),
      ),
      array('allow', // allow authenticated user to perform these actions
      'actions' => array('update', 'admin', 'delete', 'ConfirmCase', 'Export506', 'hospadmin', 'Invest'),
      'users' => array('@'),
      ),
      array('allow', // allow admin user to perform these actions
      'actions' => array('create', 'Export506Admin'),
      'users' => array('admin'), //admin
      ),
      array('deny', // deny action
      //'action'=>array(),
      'users' => array('*'),
      ),
      );
      } */

    public function accessRules() {

        $role = Yii::app()->user->getState('role');

        if ($role == 'user') {
            $arr = array('update', 'admin', 'delete', 'ConfirmCase', 'Export506', 'hospadmin', 'Invest');
        }
        if ($role == 'admin') {
            $arr = array('update', 'admin', 'delete', 'ConfirmCase', 'Export506', 'hospadmin', 'Invest', 'create', 'Export506Admin',);
        }
        if ($role == '') {
            $arr = array('');
        }

        return array(
            array('allow',
                'actions' => array('index', 'view', 'ampadmin'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => $arr,
                'users' => array('@')
            ),
            array('deny',
                'users' => array('*')
            ),
        );
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate() {
        $model = new Epe0;


        if (isset($_POST['Epe0'])) {
            $model->attributes = $_POST['Epe0'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
//$this->layout = '';
        $model = $this->loadModel($id);


        if (isset($_POST['Epe0'])) {
            $model->attributes = $_POST['Epe0'];
            if ($model->save())
                $this->redirect(array('update', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionExport506Admin() {
        ini_set('memory_limit', '64M');
// ปัญหา e0 ไม่เรียง


        $sql = "TRUNCATE TABLE `epe0confirm`";
        Yii::app()->db->createCommand($sql)->execute();

        $sql = "insert into epe0confirm select null,e1,pe0,pe1,disease,name,hn,nmepat,sex,agey,agem,aged,marietal,race,race1,
occupat,address,addrcode,metropol,hospital,type,result,hserv,class,school,datesick,datedefine,
datedeath,daterecord,datereach,intime,organism,complica,idcard,icd10,officeid
from epe0 e where e.isconfirm = 'y' ORDER BY confirmdate";
        Yii::app()->db->createCommand($sql)->execute();


        if (isset($_POST['export506'])) {

            $begin = intval($_POST['begin']);
            $end = intval($_POST['end']);

            $sql = "select * from epe0confirm where 
                (e0 between $begin and $end)";
            $model = Econfirm::model()->findAllBySql($sql);


            header("Content-Type: plain/text");
            header('Content-Disposition: Attachment; filename="epe0-' . date('Ymd') . '.txt"');
            header("Pragma: no-cache");



//csv header
            $head = "e0,e1,pe0,pe1,disease,name,hn,nmepat,sex,agey,agem,aged,marietal,race,race1,";
            $head.="occupat,address,addrcode,metropol,hospital,type,result,hserv,class,school,datesick,datedefine,";
            $head.="datedeath,daterecord,datereach,intime,organism,complica,idcard,icd10,officeid\r\n";
            echo $head;

//csv row     


            $count = 0;
            foreach ($model as $e) {

                $d = '"' . $e->disease . '"';
                $data = "$e->e0,$e->e1,$e->pe0,$e->pe1," . $d . ",$e->name,$e->hn,$e->nmepat,$e->sex,$e->agey,";
                $data.="$e->agem,$e->aged,$e->marietal,$e->race,$e->race1,$e->occupat,$e->address,$e->addrcode,";
                $data.="$e->metropol,$e->hospital,$e->type,$e->result,$e->hserv,$e->class,$e->school,$e->datesick,";
                $data.="$e->datedefine,$e->datedeath,$e->daterecord,$e->datereach,$e->intime,$e->organism,$e->complica,";
                $data.="$e->idcard,$e->icd10,$e->officeid\r\n";
                echo $data;
                $count++;
            }

            $export = new Export506;
            $export->e0begin = $_POST['begin'];
            $export->e0end = $_POST['end'];
            $export->exportdate = date("Y-m-d H:i:s");
            $export->e0count = $count;
            $export->user = Yii::app()->user->id;
            $export->save();
            exit;
        }
        $dataProvider = new CActiveDataProvider('Econfirm', array(
            'pagination' => array(
                'pageSize' => 30
            ),
            'sort' => array(
                'defaultOrder' => 'e0 DESC',
            ),
        ));

        $this->render('v_export506admin', array(
            'dataProvider' => $dataProvider,
            'export' => Export506::model()->findAll(array(
                'condition' => "user = 'admin'",
                'order' => "id DESC",
                'limit' => 7
            )),
        ));
    }

    public function actionExport506() {
        if (isset($_POST['export506'])) {

            $amp = $_POST['amp'];
            $begin = $_POST['begin'];
            $end = $_POST['end'];

            $sql = "select * from epe0 where 
                (confirmdate between '$begin 00:00:01' and '$end 23:59:59') 
                    and (hospamp=$amp) and isconfirm ='y'  and isdelete!='y'
                    order by confirmdate ASC ";
//exit;
            $model = Epe0::model()->findAllBySql($sql);

//return;
            header("Content-Type: plain/text");
            header('Content-Disposition: Attachment; filename="epe0-' . date('Ymd') . '.txt"');
            header("Pragma: no-cache");


//csv header
            $head = "e0,e1,pe0,pe1,disease,name,hn,nmepat,sex,agey,agem,aged,marietal,race,race1,";
            $head.="occupat,address,addrcode,metropol,hospital,type,result,hserv,class,school,datesick,datedefine,";
            $head.="datedeath,daterecord,datereach,intime,organism,complica,idcard,icd10,officeid\r\n";
            echo $head;

//csv row     


            $count = 0;
            foreach ($model as $e) {
                $d = '"' . $e->disease . '"';
                $data = "$e->e0,$e->e1,$e->pe0,$e->pe1," . $d . ",$e->name,$e->hn,$e->nmepat,$e->sex,$e->agey,";
                $data.="$e->agem,$e->aged,$e->marietal,$e->race,$e->race1,$e->occupat,$e->address,$e->addrcode,";
                $data.="$e->metropol,$e->hospital,$e->type,$e->result,$e->hserv,$e->class,$e->school,$e->datesick,";
                $data.="$e->datedefine,$e->datedeath,$e->daterecord,$e->datereach,$e->intime,$e->organism,$e->complica,";
                $data.="$e->idcard,$e->icd10,$e->hserv\r\n";
                echo $data;
                $count++;
            }

            $export = new Export506;

            $export->exportdate = date("Y-m-d H:i:s");
            $export->e0count = $count;
            $export->user = Yii::app()->user->id;
            $export->save();
            exit;
        }

        $this->render('v_export506');
    }

    public function actionConfirmCase($id = null) {
        if ($id !== NULL) {
            $model = $this->loadModel($id);
            $yesno = $model->isconfirm;
            if ($yesno === 'n') {
                $yesno = 'y';
            } else {
                $yesno = 'n';
            }

            $model->isconfirm = $yesno;

            $model->confirmby = Yii::app()->user->id;
            $model->officeid = Yii::app()->user->getState('officeid');
            $model->confirmdate = date('Y-m-d H:i:s');


            if ($model->save()) {
//$h = $model->getData();
                $hos = CHospcode::model()->findByPk($model->hospcode);
                $h = $hos->hospname;
/*ใส่ตาราง confirm

                $e = new Econfirm();

                $e->e0 = '';
                $e->e1 = $model->e1;
                $e->pe0 = $model->pe0;
                $e->pe1 = $model->pe1;
                $e->disease = $model->disease;
                $e->name = $model->name;
                $e->datedefine = $model->datedefine;
                $e->hn = $model->hn;
                $e->nmepat = $model->nmepat;
                $e->sex = $model->sex;
                $e->agey = $model->agey;
                $e->agem = $model->agem;
                $e->aged = $model->aged;
                $e->marietal = $model->marietal;
                $e->race = $model->race;
                $e->race1 = $model->race1;
                $e->occupat = $model->occupat;
                $e->address = $model->address;
                $e->addrcode = $model->addrcode;
                $e->metropol = $model->metropol;
                $e->hospital = $model->hospital;
                $e->type = $model->type;
                $e->result = $model->result;
                $e->hserv = $model->hserv;
                $e->class = $model->class;
                $e->school = $model->school;
                $e->datesick = $model->datesick;
                $e->datedefine = $model->datedefine;
                $e->datedeath = $model->datedeath;
                $e->daterecord = $model->daterecord;
                $e->datereach = $model->datereach;
                $e->intime = $model->intime;
                $e->organism = $model->organism;
                $e->complica = $model->complica;
                $e->idcard = $model->idcard;
                $e->icd10 = $model->icd10;
                $e->officeid = Yii::app()->user->getState('officeid');
                $e->save();
*/



                $this->redirect(array('admin', 'h' => $h, 'a' => Yii::app()->user->getState('amp')));
//$url = CHttpRequest::getUrlReferrer();
//$this->redirect(array($url));
            }
        }
    }

    public function actionDelete($id = NULL) {
        if ($id !== NULL) {
//$id=$_POST[id];
//$this->loadModel($id)->delete();
            $epe0 = $this->loadModel($id);

            $epe0->isdelete = 'y';


// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if ($epe0->update()) {
                $hos = CHospcode::model()->findByPk($epe0->hospcode);
                $h = $hos->hospname;
                $this->redirect(array('admin', 'h' => $h, 'a' => Yii::app()->user->getState('amp')));
            }
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Epe0');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin($a = NULL, $confirm = NULL, $delete = NULL, $h = NULL) {
        $this->layout = '';

        $role = Yii::app()->user->getState('role');
        $amp = Yii::app()->user->getState('amp');


        if ($a !== $amp and $role !== 'admin') {

            throw new CHttpException(503, 'The requested page does not allow.');
        }
        if ($role === 'admin') {
            $amp = $a;
        }




        $model = new Epe0('search');

        $model->unsetAttributes();  // clear any default values

        $model->isdelete = 'n';
        $model->isconfirm = 'n';

        if ($delete !== NULL) {
            $model->isdelete = "$delete";
        }
        if ($confirm !== NULL) {
            $model->isconfirm = "$confirm";
        }
        if ($h !== NULL) {
            $model->hospname_search = "$h";
        }

        if (isset($_GET['Epe0'])) {
            $model->attributes = $_GET['Epe0'];
        }



        $this->render('admin', array(
            'model' => $model,
            'hospamp' => $amp
        ));
    }

    public function actionAmpadmin() {
        $this->layout = '';
        $prov = Yii::app()->params->prov;
        $sql = "select a.`code`,a.`name`,d.total1,c.total2,f.total3,t.total4 from c_amp a 
LEFT JOIN 
( select  e.hospamp,COUNT(e.hospcode) as total1 from epe0 e where e.isdelete = 'n' and e.isconfirm ='n'
GROUP BY e.hospamp ) d on a.`code` = d.hospamp
LEFT JOIN 
( select  e.hospamp,COUNT(e.hospcode) as total2 from epe0 e where e.isdelete = 'n' and e.isconfirm ='y'
GROUP BY e.hospamp ) c on a.`code` = c.hospamp
LEFT JOIN 
( select  e.hospamp,COUNT(e.hospcode) as total3 from epe0 e where e.isdelete = 'y'
GROUP BY e.hospamp ) f on a.`code` = f.hospamp
LEFT JOIN 
( select  e.hospamp,COUNT(e.hospcode) as total4 from epe0 e 
GROUP BY e.hospamp ) t on a.`code` = t.hospamp
WHERE a.prov = $prov";

        $dataReader = Yii::app()->db->createCommand($sql)->queryAll();

        $data = new CArrayDataProvider($dataReader, array(
            'keyField' => 'code',
            'pagination' => array(
                'pageSize' => 50
            )
        ));
        /*
          $data = new CSqlDataProvider($sql, array(
          'pagination' => array(
          'pageSize' => 5
          )
          )); */

        $this->render('amp_admin', array(
            'dataProvider' => $data,
        ));
    }

    public function actionHospadmin($a = NULL) {
        $this->layout = '';
        $amp = Yii::app()->user->getState('amp');
        $role = Yii::app()->user->getState('role');
        if ($role != 'admin') {
            if ($a !== $amp) {
                throw new CHttpException(503, 'The requested page does not allow.Cause by amp');
            }
        }


        $sql = "select a.hospcode,a.hospname,d1.total1,d2.total2,d3.total3,d4.total4 from c_hospcode a 
LEFT JOIN 
( select  e.hospcode,COUNT(e.hospcode) as total1 from epe0 e where e.isdelete = 'n' and e.isconfirm ='n'
GROUP BY e.hospcode ) d1 on a.hospcode = d1.hospcode
LEFT JOIN 
( select  e.hospcode,COUNT(e.hospcode) as total2 from epe0 e where e.isdelete = 'n' and e.isconfirm ='y'
GROUP BY e.hospcode ) d2 on a.hospcode = d2.hospcode
LEFT JOIN 
( select  e.hospcode,COUNT(e.hospcode) as total3 from epe0 e where e.isdelete = 'y'
GROUP BY e.hospcode ) d3 on a.hospcode = d3.hospcode
LEFT JOIN 
( select  e.hospcode,COUNT(e.hospcode) as total4 from epe0 e 
GROUP BY e.hospcode ) d4 on a.hospcode = d4.hospcode
WHERE a.hosptype!='n'  and  a.amp='$a' and a.hospcode not like '00%'";

        $dataReader = Yii::app()->db->createCommand($sql)->queryAll();

        $data = new CArrayDataProvider($dataReader, array(
            'keyField' => 'hospcode',
            'pagination' => array('pageSize' => 100,)
        ));

        $this->render('hosp_admin', array(
            'dataProvider' => $data,
            'amp' => $a,
        ));
    }

    public function actionInvest($id = NULL) {
        $dir = 'upload';
        $info=array();
        if (count($_FILES) > 0) { // ถ้ามีการ เลือกไฟล์  
            $file = CUploadedFile::getInstancesByName('Upload');
            foreach ($file as $f) {
                $model_file = new CFile();
                $info[] = $f->name;   // ทดสอบส่งชื่อไฟล์ไปที่ view   
                $new_name = $id . '_' . iconv('UTF-8', 'TIS-620', $f->getName());
                if ($f->saveAs("$dir/$new_name")) {
//โฟร์เดอร์ upload อยู่ระดับเดียวกับ proteced  
// iconv แก้ปัญหาเรื่องไฟล์มีชื่อภาษาไทย
                    $model_file->e0id = $id;
                    $model_file->filename = $id . '_' . $f->name;
                    $model_file->extname = $f->extensionName;
                    $model_file->size = $f->size;
                    $model_file->uploaddate = date("Y-m-d H:i:s");
                    $model_file->save();
                }//..end if                
            }//..end foreach            
        }
        $this->render('v_invest', array(
            'epe0' => Epe0::model()->findByPk($id),
            'info' => $info,
            'file' => CFile::model()->findAll(array('condition' => "e0id = '$id'", 'order' => "id DESC")),
        ));
    }
    
    public function loadModel($id) {
        $model = Epe0::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'epe0-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
