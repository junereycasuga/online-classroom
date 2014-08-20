<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $user_id
 * @property string $username
 * @property string $user_password
 * @property integer $user_type
 * @property integer $id
 */
class Users extends CActiveRecord
{
	public $isPasswordChange = 0;
	public $rememberMe;
	private $_identity;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, user_password, user_type, id', 'required'),
			array('user_type, id', 'numerical', 'integerOnly'=>true),
			array('username, user_password', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, username, user_password, user_type, id', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'username' => 'Username',
			'user_password' => 'User Password',
			'user_type' => 'User Type',
			'id' => 'ID',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_type',$this->user_type);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave() {
		if($this->isPasswordChange == 1) {
			$TPassword = new TPassword();
			$this->user_password = $TPassword->hash($this->user_password);
			$this->isPasswordChange=0;

			return true;
		}
	}

	public function login() {
		$TPassword = new TPassword();
		$this->setAttribute('user_password', $TPassword->hash($this->user_password));

		$this->rememberMe = '0';
		if(isset($_POST['Users']['rememberMe'])){
			$this->rememberMe = $_POST['Users']['rememberMe'];
		}

		if($this->_identity===null) {
			$this->_identity=new UserIdentity($this->username, $this->user_password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE) {
			$duration=$this->rememberMe ? 3600*24*30 : 0;
			Yii::app()->user->login($this->_identity, $duration);
			return true;
		} else {
			return false;
		}
	}
}
