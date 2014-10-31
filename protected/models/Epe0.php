<?php

class Epe0 extends CActiveRecord {

    public $hospname_search;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'epe0';
    }

    public function relations() {
        return array(
            'relate2cprov' => array(self::BELONGS_TO, 'CProv', 'prov'),
            'relate2camp' => array(self::BELONGS_TO, 'CAmp', 'amp'),
            'relate2ctmb' => array(self::BELONGS_TO, 'CTmb', 'tmb'),
            'relate2cvill' => array(self::BELONGS_TO, 'Cvill', 'vill'),
            'relate2cdisease' => array(self::BELONGS_TO, 'Disease', 'disease'),
            'relate2csex' => array(self::BELONGS_TO, 'CSex', 'sex'),
            'relate2chospcode' => array(self::BELONGS_TO, 'CHospcode', 'hospcode'),
        );
    }

    public function rules() {

        return array(
            array('disease,name,hserv,addrcode,datedefine,sex,prov,amp,tmb,vill', 'required'),
            array('e0, e1, pe0, pe1,sex, metropol, hospital, type, result,agey, agem, aged, marietal, race, race1, occupat', 'numerical', 'integerOnly' => true),
            array('id, pid, hospcode', 'length', 'max' => 100),
            array('disease, name, hn, nmepat, address, addrcode, hserv, class, school, datesick, datedefine, datedeath, daterecord, datereach, intime, organism, complica, idcard, icd10, officeid, latitude, longitude, moo, village_name, r506name, confirmby, confirmdate, export506date, exportsurveildate', 'length', 'max' => 255),
            array('seq', 'length', 'max' => 16),
            array('provider', 'length', 'max' => 13),
            array('isconfirm, is507, isdelete', 'length', 'max' => 1),
            array('hospamp, amp', 'length', 'max' => 4),
            array('prov', 'length', 'max' => 2),
            array('tmb', 'length', 'max' => 6),
            array('vill', 'length', 'max' => 8),
            array(
                'id, pid, hospcode, e0, e1, pe0, pe1, disease, name, hn,
                nmepat, sex, agey, agem, aged, marietal, race, race1, occupat,
                address, addrcode, metropol, hospital, type, result, hserv, class, school,
                datesick, datedefine, datedeath, daterecord, datereach, intime, organism, complica,
                idcard, icd10, officeid, latitude, longitude, moo, village_name,
                r506name, seq, provider, isconfirm, confirmby, confirmdate, is507,
                export506date, exportsurveildate, isdelete, hospamp, prov, amp,
                tmb, vill ,hospname_search ',
                'safe', 'on' => 'search'),
        );
    }

    public function defaultScope() {
        if (Yii::app()->user->getState('role') !== 'admin') {
            $hospamp = Yii::app()->user->getState('amp');
            return array('condition' => "hospamp=$hospamp");
        } else {
            if (!isset($_GET['a']) || empty($_GET['a'])) {
                return array();
            } else {
                $aa = $_GET['a'];
                return array('condition' => "hospamp=$aa");
            }
        }
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'pid' => 'Pid',
            'hospcode' => 'สถานบริการ',
            'hospname_search' => 'หน่วยงาน',
            'e0' => 'E0',
            'e1' => 'E1',
            'pe0' => 'Pe0',
            'pe1' => 'Pe1',
            'disease' => 'โรค',
            'name' => 'ชื่อ-สกุล',
            'hn' => 'Hn',
            'nmepat' => 'ผู้ปกครอง',
            'sex' => 'เพศ',
            'agey' => 'อายุ(ปี)',
            'agem' => 'อายุ(เดือน)',
            'aged' => 'อายุ(วัน)',
            'marietal' => 'สถานภาพสมรส',
            'race' => 'สัญชาติ',
            'race1' => 'เชื้อชาติ',
            'occupat' => 'อาชีพ',
            'address' => 'บ้านเลขที่',
            'addrcode' => 'Addrcode',
            'metropol' => 'ท้องที่',
            'hospital' => 'สถานที่รักษา',
            'type' => 'ประเภทผู้ป่วย',
            'result' => 'สภาพผู้ป่วย',
            'hserv' => 'Hserv',
            'class' => 'ชั้น',
            'school' => 'โรงเรียน',
            'datesick' => 'วันป่วย(datesick)',
            'datedefine' => 'วันพบ(datedefine)',
            'datedeath' => 'วันเสียชีวิต(datedeath)',
            'daterecord' => 'วันบันทึก(daterecord)',
            'datereach' => 'วันส่ง(datereach)',
            'intime' => 'Intime',
            'organism' => 'Organism',
            'complica' => 'Complica',
            'idcard' => 'Idcard',
            'icd10' => 'Icd10',
            'officeid' => 'Officeid',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'moo' => 'Moo',
            'village_name' => 'Village Name',
            'r506name' => 'R506name',
            'seq' => 'Seq',
            'provider' => 'Provider',
            'isconfirm' => 'ยืนยัน',
            'confirmby' => 'Confirmby',
            'confirmdate' => 'Confirmdate',
            'is507' => 'Is507',
            'export506date' => 'Export506date',
            'exportsurveildate' => 'Exportsurveildate',
            'isdelete' => 'Isdelete',
            'hospamp' => 'Hospamp',
            'prov' => 'จังหวัด',
            'amp' => 'อำเภอ',
            'tmb' => 'ตำบล',
            'vill' => 'หมู่',
        );
    }

    public function search() {

        $criteria = new CDbCriteria;
        $criteria->with = array('relate2chospcode');

        $criteria->compare('id', $this->id, true);
        $criteria->compare('pid', $this->pid, true);
        $criteria->compare('hospcode', $this->hospcode, true);
        $criteria->compare('relate2chospcode.hospname', $this->hospname_search, true);
        $criteria->compare('e0', $this->e0);
        $criteria->compare('e1', $this->e1);
        $criteria->compare('pe0', $this->pe0);
        $criteria->compare('pe1', $this->pe1);
        $criteria->compare('disease', $this->disease, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('hn', $this->hn, true);
        $criteria->compare('nmepat', $this->nmepat, true);
        $criteria->compare('sex', $this->sex, true);
        $criteria->compare('agey', $this->agey, true);
        $criteria->compare('agem', $this->agem, true);
        $criteria->compare('aged', $this->aged, true);
        $criteria->compare('marietal', $this->marietal, true);
        $criteria->compare('race', $this->race, true);
        $criteria->compare('race1', $this->race1, true);
        $criteria->compare('occupat', $this->occupat, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('addrcode', $this->addrcode, true);
        $criteria->compare('metropol', $this->metropol, true);
        $criteria->compare('hospital', $this->hospital, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('result', $this->result, true);
        $criteria->compare('hserv', $this->hserv, true);
        $criteria->compare('class', $this->class, true);
        $criteria->compare('school', $this->school, true);
        $criteria->compare('datesick', $this->datesick, true);
        $criteria->compare('datedefine', $this->datedefine, true);
        $criteria->compare('datedeath', $this->datedeath, true);
        $criteria->compare('daterecord', $this->daterecord, true);
        $criteria->compare('datereach', $this->datereach, true);
        $criteria->compare('intime', $this->intime, true);
        $criteria->compare('organism', $this->organism, true);
        $criteria->compare('complica', $this->complica, true);
        $criteria->compare('idcard', $this->idcard, true);
        $criteria->compare('icd10', $this->icd10, true);
        $criteria->compare('officeid', $this->officeid, true);
        $criteria->compare('latitude', $this->latitude, true);
        $criteria->compare('longitude', $this->longitude, true);
        $criteria->compare('moo', $this->moo, true);
        $criteria->compare('village_name', $this->village_name, true);
        $criteria->compare('r506name', $this->r506name, true);
        $criteria->compare('seq', $this->seq, true);
        $criteria->compare('provider', $this->provider, true);
        $criteria->compare('isconfirm', $this->isconfirm, true);
        $criteria->compare('confirmby', $this->confirmby, true);
        $criteria->compare('confirmdate', $this->confirmdate, true);
        $criteria->compare('is507', $this->is507, true);
        $criteria->compare('export506date', $this->export506date, true);
        $criteria->compare('exportsurveildate', $this->exportsurveildate, true);
        $criteria->compare('isdelete', $this->isdelete, true);
        $criteria->compare('hospamp', $this->hospamp, true);
        $criteria->compare('prov', $this->prov, true);
        $criteria->compare('amp', $this->amp, true);
        $criteria->compare('tmb', $this->tmb, true);
        $criteria->compare('vill', $this->vill, true);


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 15,),
            'sort' => array(
                'defaultOrder' => 'e0 DESC', 
                'attributes' => array(
                    
                    'hospname_search' => array(
                        'asc' => 'relate2chospcode.hospname',
                        'desc' => 'relate2chospcode.hospname DESC',
                    ),
                    '*',
                )
            )
                )
        );
    }

}
