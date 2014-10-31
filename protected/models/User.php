<?php


class User extends CActiveRecord {

    
   

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('countlogin', 'numerical', 'integerOnly' => true),
            array('username,password,fullname,amp,role,officeid','required'),
            array('username, password, fullname, office, tel, email, role, lastlogin,officeid', 'length', 'max' => 255),
            array('amp', 'length', 'max' => 4),
            array('ispermission', 'length', 'max' => 5),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('username, password, fullname, amp, office, tel, email, role, lastlogin, countlogin, ispermission,officeid', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    
    public function attributeLabels() {
        return array(
            'username' => 'ชื่อผู้ใช้',
            'password' => 'รหัสผ่าน',
            'fullname' => 'ชื่อ',
            'amp' => 'Amp',
            'office' => 'Office',
            'tel' => 'Tel',
            'email' => 'Email',
            'role' => 'สิทธิการใช้',
            'lastlogin' => 'ใช้ครั้งสุดท้าย',
            'countlogin' => 'จำนวนครั้งเข้าใช้',
            'ispermission' => 'Ispermission',
            'officeid'=>'รหัสศูนย์ระบาดอำเภอ'
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('fullname', $this->fullname, true);
        $criteria->compare('amp', $this->amp, true);
        $criteria->compare('office', $this->office, true);
        $criteria->compare('tel', $this->tel, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('role', $this->role, true);
        $criteria->compare('lastlogin', $this->lastlogin, true);
        $criteria->compare('countlogin', $this->countlogin);
        $criteria->compare('ispermission', $this->ispermission, true);
        $criteria->compare('officeid', $this->officeid, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    


}
