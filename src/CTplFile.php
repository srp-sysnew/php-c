<?php
namespace C;

class CTplFile {

    /**
     *
     *
     * @return string
     */
	public static function path() {

    	$basename = basename($_SERVER['SCRIPT_NAME'], '.php');

    	if ($basename == '') {
    		$basename = 'index';
    	}

        $path = dirname($_SERVER['SCRIPT_NAME']) . '/' . $basename . '.tpl';
        $path = preg_replace('/^\/+/', '', $path);

        return $path;
    }

    /**
     * $_GET['tpl']からテンプレートファイル名取得
     *
     * @param
     * @return string
     */
    public static function view() {

    	if (isset($_GET['tpl']) && preg_match('/^[A-Za-z0-9_]+$/', $_GET['tpl'])) {
            $basename = $_GET['tpl'];
        } else {
	    $basename = 'index';
        }
        $path = dirname($_SERVER['SCRIPT_NAME']) . '/' . $basename . '.tpl';
        $path = preg_replace('/^\/+/', '', $path);

        return $path;

    }
}

