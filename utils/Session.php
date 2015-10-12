<?php

class Session {
	public static function init() {
		if(!self::is_session_started()) {
			session_start();
		}
	}

	public static function destroy() {
		session_unset();
		session_destroy();
	}

	public static function write($key, $value) {
		self::init();
		
		// if(self::exist($key)) {
		// 	if(is_array($_SESSION[$key])) {
		// 		$tmp = array_merge($_SESSION[$key], $value);
		// 		$_SESSION[$key] = $tmp;
		// 	} elseif (is_object($_SESSION[$key])) {
		// 		$tmp = (array) $_SESSION[$key];
		// 		$tmp2 = array_merge($tmp,$value);
		// 		$_SESSION[$key] = (object) $tmp2;
		// 	} else {
		// 		$_SESSION[$key] = $value;
		// 	}
		// } else {
		// 	$_SESSION[$key] = $value;
		// }
		$_SESSION[$key] = $value;
	}

	public static function read($key) {
		self::init();

		if(self::exist($key)) {
			return $_SESSION[$key];
		} else {
			return false;
		}
	}

	public static function delete($key) {
		self::init();

		if(self::exist($key)) {
			unset($_SESSION[$key]);
		}

		return true;
	}

	public static function exist($key) {
		return isset($_SESSION[$key]);
	}

	// http://php.net/session_status
	public static function is_session_started()
	{
	    if ( php_sapi_name() !== 'cli' ) {
	        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
	            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
	        } else {
	            return session_id() === '' ? FALSE : TRUE;
	        }
	    }
	    return FALSE;
	}
}