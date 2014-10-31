<?php

class AnalyzeController extends Controller {

    public function actionChkConfirm() {

        $filtersForm = new FiltersForm;
        if (isset($_GET['FiltersForm'])) {
            $filtersForm->filters = $_GET['FiltersForm'];
        }

        $sql = "select e.id, e.hospcode,h.hospname,e.disease,
SUBSTRING_INDEX(e.name,' ',1) as ename,
e.d_update,e.confirmdate,e.confirmby from epe0 e
LEFT JOIN c_hospcode h on h.hospcode = e.hospcode
where e.isdelete='n' and
e.datereach like CURDATE()
ORDER BY e.d_update DESC, e.confirmdate DESC";
        $dataReader = Yii::app()->db->createCommand($sql)->queryAll();
        $filtersData = $filtersForm->filter($dataReader);

        $model = new CArrayDataProvider($filtersData, array(
            'keyField' => 'id',
            'pagination' => array(
                'pageSize' => 15
            ),
            'sort' => array(
                'attributes' => @array_keys($dataReader[0]),
            ),
        ));
        $this->render('v_chkconfirm', array(
            'model' => $model,
            'filtersForm' => $filtersForm,
        ));
    }

    public function actionChartTopTen($year = null) {
        if ($year === NULL) {
            $year = '2014';
        }
        $sql = "select * from (
            SELECT concat('(',d.code,')',d.disease) as disease,count(e.disease) as total 
            FROM epe0 e       
            left join c_disease d on d.code = e.disease 
            where e.disease in (select code from c_disease)
            and YEAR(e.datesick) in ('$year') 
                and e.isdelete in ('n') and e.isconfirm in ('y')
            group by disease ) tb            
            order by total DESC limit 10";

        //$sql = "select * from (SELECT e.disease,count(e.disease) as total 
        //FROM Epe0 e where e.disease in (select code from c_disease)group by e.disease) tb    
        // order by total DESC limit 10";


        $dataReader = Yii::app()->db->createCommand($sql)->queryAll();

        $data = new CArrayDataProvider($dataReader, array(
            'keyField' => 'disease'
        ));

        $this->render('v_charttop10', array('data' => $data));
    }

    public function actionMedian() {

        if (!empty($_POST['disease'])) {

            $dcode = $_POST['disease'];
            $model = CDisease::model()->findByPk($dcode);

            $data = array();
            for ($i = 1; $i <= 12; $i++) {


                $sql = "SELECT COUNT(e.e0) from epe0 e WHERE disease = '$dcode'";
                $sql.=" and YEAR(e.datesick)='2014' ";
                $sql.=" and  MONTH(e.datesick)=$i";
                $sql.=" and e.isdelete='n'";
                $sql.=" and e.isconfirm='y'";


                $m = Yii::app()->db->createCommand($sql)->queryScalar();

                array_push($data, intval($m));
            }

            $this->render('v_median', array(
                'disease' => $model->code,
                'dname' => $model->disname,
                'data' => $data
            ));
        } else {
            $this->render('v_median', array(
                'disease' => 'กรุณาเลือกโรค',
                'dname' => null,
                'data' => null
            ));
        }
    }

    public function actionMap() {

        $this->render('v_map', array(
                //'disease' => '02',
        ));
    }

    public function actionHossend() {

        $amp = Yii::app()->user->getState('amp');
        $d1 = '';
        $d2 = '';

        $sql = "select a.amp,a.hospcode,a.hospname,d1.y,d2.n,d3.t from c_hospcode a
LEFT JOIN 
(
select e.hospcode,count(e.hospcode) as y from epe0 e where e.isdelete!='y' and e.isconfirm ='y'

GROUP BY e.hospcode
) d1  on d1.hospcode = a.hospcode
 LEFT JOIN 
(
select e.hospcode,count(e.hospcode) as n from epe0 e where e.isdelete!='y' and e.isconfirm ='n'

GROUP BY e.hospcode
) d2  on d2.hospcode = a.hospcode
 LEFT JOIN 
(
select e.hospcode,count(e.hospcode) as t from epe0 e where e.isdelete!='y'

GROUP BY e.hospcode
) d3  on d3.hospcode = a.hospcode

where a.amp = $amp and a.hospcode not like '00%'";

        if (!empty($_POST['begin']) && !empty($_POST['end'])) {
            $d1 = $_POST['begin'];
            $d2 = $_POST['end'];
            $sql = "select a.amp,a.hospcode,a.hospname,d1.y,d2.n,d3.t from c_hospcode a
LEFT JOIN 
(
select e.hospcode,count(e.hospcode) as y from epe0 e where e.isdelete!='y' and e.isconfirm ='y'
and e.datereach BETWEEN '$d1' and '$d2'
GROUP BY e.hospcode
) d1  on d1.hospcode = a.hospcode
 LEFT JOIN 
(
select e.hospcode,count(e.hospcode) as n from epe0 e where e.isdelete!='y' and e.isconfirm ='n'
and e.datereach BETWEEN '$d1' and '$d2'
GROUP BY e.hospcode
) d2  on d2.hospcode = a.hospcode
 LEFT JOIN 
(
select e.hospcode,count(e.hospcode) as t from epe0 e where e.isdelete!='y'
and e.datereach BETWEEN '$d1' and '$d2'
GROUP BY e.hospcode
) d3  on d3.hospcode = a.hospcode
####################
where a.amp = $amp and a.hospcode not like '00%'";
        }

        $dataReader = Yii::app()->db->createCommand($sql)->queryAll();

        $model = new CArrayDataProvider($dataReader, array(
            'keyField' => 'hospcode',
            'pagination' => array(
                'pageSize' => 200
            )
        ));

        $this->render('v_hossend', array(
            'model' => $model,
            'd1' => $d1,
            'd2' => $d2
                )
        );
    }

}

