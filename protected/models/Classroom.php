<?php

/**
 * This is the model class for table "classroom".
 *
 * The followings are the available columns in table 'classroom':
 * @property integer $id
 * @property string $classroom_name
 * @property integer $classroom_subject
 * @property integer $classroom_teacher
 */
class Classroom extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'classroom';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, classroom_name, classroom_subject, classroom_teacher', 'required'),
			array('id, classroom_subject, classroom_teacher', 'numerical', 'integerOnly'=>true),
			array('classroom_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, classroom_name, classroom_subject, classroom_teacher', 'safe', 'on'=>'search'),
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
			'classroom_name' => 'Classroom Name',
			'classroom_subject' => 'Classroom Subject',
			'classroom_teacher' => 'Classroom Teacher',
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
		$criteria->compare('classroom_name',$this->classroom_name,true);
		$criteria->compare('classroom_subject',$this->classroom_subject);
		$criteria->compare('classroom_teacher',$this->classroom_teacher);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Classroom the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getClassroomsOfTeacher($id) {
		$model = self::model()->findAllByAttributes(array('classroom_teacher'=>$id));

		return $model;
	}
}
