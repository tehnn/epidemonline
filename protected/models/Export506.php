<?php

/**
 * This is the model class for table "export506".
 *
 * The followings are the available columns in table 'export506':
 * @property integer $id
 * @property string $exportdate
 * @property integer $e0begin
 * @property integer $e0end
 * @property integer $e0count
 * @property string $user
 */
class Export506 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'export506';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('e0begin, e0end, e0count', 'numerical', 'integerOnly'=>true),
			array('exportdate, user', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, exportdate, e0begin, e0end, e0count, user', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'exportdate' => 'Exportdate',
			'e0begin' => 'E0begin',
			'e0end' => 'E0end',
			'e0count' => 'E0count',
			'user' => 'User',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('exportdate',$this->exportdate,true);
		$criteria->compare('e0begin',$this->e0begin);
		$criteria->compare('e0end',$this->e0end);
		$criteria->compare('e0count',$this->e0count);
		$criteria->compare('user',$this->user,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Export506 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
