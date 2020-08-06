<?php
/**
 * @author Arman Arif
 * @project PBS Store
 * @email atarmanarif@gmail.com
 * @copyright 2019 pbs.armanarif.com
 */
namespace libraries;

class Session {
	private static $_sessionStarted = false;
	
	public static function start(){
            if (self::$_sessionStarted == false) {
                session_start();
                self::$_sessionStarted = true;
            }
	}
	
	public static function set($key, $value, $under = null){
            if ($under != null)
                $_SESSION[$under][$key] = $value;
            else
                $_SESSION[$key] = $value;
		
	}
	
	public static function get($key, $secondKey = false){
            if ($secondKey == true) {
                    if (isset($_SESSION[$key][$secondKey])) {
                            return $_SESSION[$key][$secondKey];
                    }
            } else if (isset($_SESSION[$key])) {
                    return $_SESSION[$key];
            } else {
                    return false;
            }
            return false;
	}
	
	public static function is_set($key, $secondKey = false) {
            if ($secondKey != false AND isset($_SESSION[$key][$secondKey]))
                    return true;
            else if (isset($_SESSION[$key]))
                    return true;

            return false;
	}

    public static function has($key, $secondKey = false) {
        if ($secondKey != false AND isset($_SESSION[$key][$secondKey]))
            return true;
        else if (isset($_SESSION[$key]))
            return true;

        return false;
    }
	
	public static function un_set($key, $secondKey = false){
            if ($secondKey != false AND isset($_SESSION[$key][$secondKey]))
                    unset($_SESSION[$key][$secondKey]);
            else if (isset($_SESSION[$key]))
                    unset($_SESSION[$key]);

            return false;
	}

    public static function remove($key, $secondKey = false){
        if ($secondKey != false AND isset($_SESSION[$key][$secondKey]))
            unset($_SESSION[$key][$secondKey]);
        else if (isset($_SESSION[$key]))
            unset($_SESSION[$key]);

        return false;
    }
	
	public static function display(){
            echo "<pre>";
            print_r($_SESSION);
            echo "</pre>";
	}
	
	public static function destroy(){
            if (self::$_sessionStarted == true) {
                session_unset();
                session_destroy();
            }
	}
	
} //end of class