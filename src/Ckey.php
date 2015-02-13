<?php
namespace C;

class Ckey {

	/**
	 *
	 * @param string $token
	 * @return boolean
	 */
	public static function check($token)  {

		$tmp = self::create();
		if ($token == $tmp) {
			return true;
		}
		return false;
	}

	/**
	 *
	 * @return string
	 */
	public static function create() {
		$ckey = G::v($_SESSION,'CKEY');
		if (empty($ckey)){
			$_SESSION['CKEY'] = G::uuid();
		}
		return $ckey;
	}

}

