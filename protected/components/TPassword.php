<?php
//using bcrypt
class TPassword {
  private $rounds;
  private $key;
  public $salt;
  public $salt2;
  public function __construct() {
    $this->salt = array(yii::app()->params['salt1'],yii::app()->params['salt2']);
  }

  public function hash($input) {
    $inputWithSalt = $this->salt[0].$input.$this->salt[1];
    $hash =hash('sha512',$inputWithSalt);

    return $hash;
  }

  public function verify($input, $existingHash) {
    $inputWithSalt = $this->salt[0].$input.$this->salt[1];
    $hash =hash('sha512',$inputWithSalt);

    return $hash === $existingHash;
  }
}
?>