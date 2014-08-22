<?php

/**
 * This is the model class for table "quizzes".
 *
 * The followings are the available columns in table 'quizzes':
 * @property integer $id
 * @property string $quiz_title
 * @property string $quiz_body
 * @property string $quiz_deadline
 * @property integer $classroom_id
 */
class Quizzes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'quizzes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('quiz_title, quiz_body, quiz_deadline, classroom_id', 'required'),
			array('classroom_id', 'numerical', 'integerOnly'=>true),
			array('quiz_title', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, quiz_title, quiz_body, quiz_deadline, classroom_id', 'safe', 'on'=>'search'),
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
			'quiz_title' => 'Quiz Title',
			'quiz_body' => 'Quiz Body',
			'quiz_deadline' => 'Quiz Deadline',
			'classroom_id' => 'Classroom',
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
		$criteria->compare('quiz_title',$this->quiz_title,true);
		$criteria->compare('quiz_body',$this->quiz_body,true);
		$criteria->compare('quiz_deadline',$this->quiz_deadline,true);
		$criteria->compare('classroom_id',$this->classroom_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Quizzes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getQuizzesOfClassroom($id) {
		$model = self::model()->findAllByAttributes(array('classroom_id'=>$id));

		return $model;
	}
}
