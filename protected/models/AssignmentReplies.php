<?php

/**
 * This is the model class for table "assignment_replies".
 *
 * The followings are the available columns in table 'assignment_replies':
 * @property integer $id
 * @property integer $assignment_id
 * @property integer $student_id
 * @property string $assignment_reply
 * @property string $assignment_reply_date
 */
class AssignmentReplies extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'assignment_replies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, assignment_id, student_id, assignment_reply', 'required'),
			array('id, assignment_id, student_id', 'numerical', 'integerOnly'=>true),
			array('assignment_reply_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, assignment_id, student_id, assignment_reply, assignment_reply_date', 'safe', 'on'=>'search'),
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
			'assignment_id' => 'Assignment',
			'student_id' => 'Student',
			'assignment_reply' => 'Assignment Reply',
			'assignment_reply_date' => 'Assignment Reply Date',
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
		$criteria->compare('assignment_id',$this->assignment_id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('assignment_reply',$this->assignment_reply,true);
		$criteria->compare('assignment_reply_date',$this->assignment_reply_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AssignmentReplies the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
