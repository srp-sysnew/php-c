<?php
namespace C;

class G {
	public static $HASH_SALT = '0129abcdefghijklmnop012345';
	public static $CKEY_SALT = '0213abcdefghijklmnop012345';
	public static $DIR_BASE = '';
	public static $DIR_CACHE = '';
	public static $URL_LOGIN = '/';
	public static function init() {
	}

	/**
	 * hash
	 *
	 * @param string $str
	 * @return string
	 */
	public static function hash($str) {
		return hash('sha256', self::$HASH_SALT . $str, false);
	}

	/**
	 * generate uuid
	 *
	 * @return string
	 */
	public static function uuid() {
    	return sprintf( '%04x%04x%04x%04x%04x%04x%04x%04x',
        	// 32 bits for "time_low"
        	mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        	// 16 bits for "time_mid"
        	mt_rand( 0, 0xffff ),

        	// 16 bits for "time_hi_and_version",
        	// four most significant bits holds version number 4
        	mt_rand( 0, 0x0fff ) | 0x4000,

        	// 16 bits, 8 bits for "clk_seq_hi_res",
        	// 8 bits for "clk_seq_low",
        	// two most significant bits holds zero and one for variant DCE1.1
        	mt_rand( 0, 0x3fff ) | 0x8000,

        	// 48 bits for "node"
       	 	mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    	);
	}


	public static function mail_utf8($to, $from_user, $from,
                                             $subject = '(No subject)', $message = '')
{
      $from_user = "=?UTF-8?B?".base64_encode($from_user)."?=";
      $subject = "=?UTF-8?B?".base64_encode($subject)."?=";

      $headers = "From: {$from_user} <{$from}>\r\n";

      $headers .=         "MIME-Version: 1.0" . "\r\n" .
               "Content-type: text/plain; charset=UTF-8" . "\r\n";

/*
$message = str_replace("\n", "\r\n", $message);
*/
     return mail($to, $subject, $message, $headers);
	}

	/**
	 *
	 *
	 * @param array $list
	 * @param int|string $key
	 * @param string $default
	 * @return mixed
	 */
	public static function v($list, $key, $default='') {
		if (is_array($list) && array_key_exists($key, $list)) {
			if (is_array($list[$key])) {
				return $list[$key];
			}
			return trim($list[$key]);
		}
		return $default;
	}

	/**
	 * return empty($obj)
	 *
	 * @param mxied $obj
	 * @return bool
	 */
	public static function isempty($obj) {
		return empty($obj);
	}

	/**
	 * echo '<pre>' and print_r
	 *
	 * @param mixed $obj
	 */
	public static function pr($obj) {
		echo '<pre>';
		print_r($obj);
		echo '</pre>';
	}
}
