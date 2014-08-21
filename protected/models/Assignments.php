<?php

/**
 * This is the model class for table "assignments".
 *
 * The followings are the available columns in table 'assignments':
 * @property integer $id
 * @property integer $classroom_id
 * @property string $assignment_title
 * @property string $assignment_body
 * @property string $assignment_deadline
 */
class Assignments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'assignments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('classroom_id, assignment_title, assignment_body, assignment_deadline', 'required'),
			array('classroom_id', 'numerical', 'integerOnly'=>true),
			array('assignment_title', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, classroom_id, assignment_title, assignment_body, assignment_deadline', 'safe', 'on'=>'search'),
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
			'classroom_id' => 'Classroom',
			'assignment_title' => 'Assignment Title',
			'assignment_body' => 'Assignment Body',
			'assignment_deadline' => 'Assignment Deadline',
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
		$criteria->compare('classroom_id',$this->classroom_id);
		$criteria->compare('assignment_title',$this->assignment_title,true);
		$criteria->compare('assignment_body',$this->assignment_body,true);
		$criteria->compare('assignment_deadline',$this->assignment_deadline,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Assignments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getAssignmentsOfClassroom($id) {
		$model = self::model()->findAllByAttributes(array('classroom_id'=>$id));

		return $model;
	}
}
