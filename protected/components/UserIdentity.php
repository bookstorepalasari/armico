<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
        $user = UserPemakai::model()->findByAttributes(array('nama_pemakai' => $this->username));
        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_PASSWORD_INVALID;
        } else {
			if ($user->is_aktif == true) {
				$this->_id = $user->id;
				$attributes = $user->getAttributes();
				foreach($attributes as $attribute=>$value) {
					$this->setState($attribute, $value);                    
				}
				if ($user->kata_kunci !== md5($this->password)) {
					$this->errorCode = self::ERROR_USERNAME_PASSWORD_INVALID;
				} else{
					$user->last_login = date('Y-m-d H:i:s');
					$user->save();
					$this->errorCode = self::ERROR_NONE;
				}
			} else {
				$this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
			}
        }
        return $this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }
}