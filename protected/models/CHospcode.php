<?php

/**
 * This is the model class for table "c_hospcode".
 *
 * The followings are the available columns in table 'c_hospcode':
 * @property string $hospcode
 * @property string $hospname
 * @property string $prov
 * @property string $amp
 * @property string $hosptype
 */
class CHospcode extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'c_hospcode';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hospcode', 'required'),
			array('hospcode', 'length', 'max'=>5),
			array('hospname', 'length', 'max'=>255),
			array('prov, hosptype', 'length', 'max'=>2),
			array('amp', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('hospcode, hospname, prov, amp, hosptype', 'safe', 'on'=>'search'),
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
			'hospcode' => 'Hospcode',
			'hospname' => 'Hospname',
			'prov' => 'Prov',
			'amp' => 'Amp',
			'hosptype' => 'Hosptype',
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

		$criteria->compare('hospcode',$this->hospcode,true);
		$criteria->compare('hospname',$this->hospname,true);
		$criteria->compare('prov',$this->prov,true);
		$criteria->compare('amp',$this->amp,true);
		$criteria->compare('hosptype',$this->hosptype,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CHospcode the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
