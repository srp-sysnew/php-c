<?php
namespace C;

class TplFile {

    /**
     *
     *
     * @return string
     */
	public static function path() {

	// マルチバイト不許可
	$script_name = mb_convert_encoding($_SERVER['SCRIPT_NAME'], 'ascii', 'auto');
	
    	$basename = basename($script_name, '.php');

    	if ($basename == '') {
    		$basename = 'index';
    	}

        $path = dirname($script_name) . '/' . $basename . '.tpl';
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

    	// マルチバイト不許可
	$script_name = mb_convert_encoding($_SERVER['SCRIPT_NAME'], 'ascii', 'auto');
	
	if (isset($_GET['tpl']) && preg_match('/^[A-Za-z0-9_]+$/', $_GET['tpl'])) {
            $basename = $_GET['tpl'];
        } else {
	    $basename = 'index';
        }
        $path = dirname($script_name) . '/' . $basename . '.tpl';
        $path = preg_replace('/^\/+/', '', $path);

        return $path;

    }
}

