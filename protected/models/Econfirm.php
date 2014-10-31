<?php

/**
 * This is the model class for table "epe0confirm".
 *
 * The followings are the available columns in table 'epe0confirm':
 * @property integer $e0
 * @property integer $e1
 * @property integer $pe0
 * @property integer $pe1
 * @property string $disease
 * @property string $name
 * @property string $hn
 * @property string $nmepat
 * @property string $sex
 * @property string $agey
 * @property string $agem
 * @property string $aged
 * @property string $marietal
 * @property string $race
 * @property string $race1
 * @property string $occupat
 * @property string $address
 * @property string $addrcode
 * @property string $metropol
 * @property string $hospital
 * @property string $type
 * @property string $result
 * @property string $hserv
 * @property string $class
 * @property string $school
 * @property string $datesick
 * @property string $datedefine
 * @property string $datedeath
 * @property string $daterecord
 * @property string $datereach
 * @property string $intime
 * @property string $organism
 * @property string $complica
 * @property string $idcard
 * @property string $icd10
 * @property string $officeid
 */
class Econfirm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'epe0confirm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('disease,name, datedefine', 'required'),
			array('e1, pe0, pe1', 'numerical', 'integerOnly'=>true),
			array('disease, name, hn, nmepat, sex, agey, agem, aged, marietal, race, race1, occupat, address, addrcode, metropol, hospital, type, result, hserv, class, school, datesick, datedefine, datedeath, daterecord, datereach, intime, organism, complica, idcard, icd10, officeid', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('e0, e1, pe0, pe1, disease, name, hn, nmepat, sex, agey, agem, aged, marietal, race, race1, occupat, address, addrcode, metropol, hospital, type, result, hserv, class, school, datesick, datedefine, datedeath, daterecord, datereach, intime, organism, complica, idcard, icd10, officeid', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'e0' => 'E0',
			'e1' => 'E1',
			'pe0' => 'Pe0',
			'pe1' => 'Pe1',
			'disease' => 'Disease',
			'name' => 'Name',
			'hn' => 'Hn',
			'nmepat' => 'Nmepat',
			'sex' => 'Sex',
			'agey' => 'Agey',
			'agem' => 'Agem',
			'aged' => 'Aged',
			'marietal' => 'Marietal',
			'race' => 'Race',
			'race1' => 'Race1',
			'occupat' => 'Occupat',
			'address' => 'Address',
			'addrcode' => 'Addrcode',
			'metropol' => 'Metropol',
			'hospital' => 'Hospital',
			'type' => 'Type',
			'result' => 'Result',
			'hserv' => 'Hserv',
			'class' => 'Class',
			'school' => 'School',
			'datesick' => 'Datesick',
			'datedefine' => 'Datedefine',
			'datedeath' => 'Datedeath',
			'daterecord' => 'Daterecord',
			'datereach' => 'Datereach',
			'intime' => 'Intime',
			'organism' => 'Organism',
			'complica' => 'Complica',
			'idcard' => 'Idcard',
			'icd10' => 'Icd10',
			'officeid' => 'Officeid',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('e0',$this->e0);
		$criteria->compare('e1',$this->e1);
		$criteria->compare('pe0',$this->pe0);
		$criteria->compare('pe1',$this->pe1);
		$criteria->compare('disease',$this->disease,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('hn',$this->hn,true);
		$criteria->compare('nmepat',$this->nmepat,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('agey',$this->agey,true);
		$criteria->compare('agem',$this->agem,true);
		$criteria->compare('aged',$this->aged,true);
		$criteria->compare('marietal',$this->marietal,true);
		$criteria->compare('race',$this->race,true);
		$criteria->compare('race1',$this->race1,true);
		$criteria->compare('occupat',$this->occupat,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('addrcode',$this->addrcode,true);
		$criteria->compare('metropol',$this->metropol,true);
		$criteria->compare('hospital',$this->hospital,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('result',$this->result,true);
		$criteria->compare('hserv',$this->hserv,true);
		$criteria->compare('class',$this->class,true);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('datesick',$this->datesick,true);
		$criteria->compare('datedefine',$this->datedefine,true);
		$criteria->compare('datedeath',$this->datedeath,true);
		$criteria->compare('daterecord',$this->daterecord,true);
		$criteria->compare('datereach',$this->datereach,true);
		$criteria->compare('intime',$this->intime,true);
		$criteria->compare('organism',$this->organism,true);
		$criteria->compare('complica',$this->complica,true);
		$criteria->compare('idcard',$this->idcard,true);
		$criteria->compare('icd10',$this->icd10,true);
		$criteria->compare('officeid',$this->officeid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Epe0confirm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
