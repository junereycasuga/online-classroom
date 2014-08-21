<?php

/**
 * This is the model class for table "subjects".
 *
 * The followings are the available columns in table 'subjects':
 * @property integer $id
 * @property string $subject_shortcode
 * @property string $subject_longname
 */
class Subjects extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'subjects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject_shortcode, subject_longname', 'required'),
			array('subject_shortcode, subject_longname', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subject_shortcode, subject_longname', 'safe', 'on'=>'search'),
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
			'subject_shortcode' => 'Subject Shortcode',
			'subject_longname' => 'Subject Longname',
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
		$criteria->compare('subject_shortcode',$this->subject_shortcode,true);
		$criteria->compare('subject_longname',$this->subject_longname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Subjects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getSubjects()
	{
		return CHtml::listData(self::model()->findAll(), 'id', 'subject_longname');
	}

	public static function getSubjectShortCode($id)
	{
		$model = self::model()->findByPk($id);

		return $model->subject_shortcode;
	}

	public static function getSubjectLongName($id)
	{
		$model = self::model()->findByPk($id);

		return $model->subject_longname;
	}
}
