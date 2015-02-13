<?php
/**
 * For Smarty3
 *
 **/

namespace C;

class Smarty extends \Smarty {
  /**
   * 
   */
  function __construct()
  {
    parent::__construct();
    
    $dir=realpath(dirname(__FILE__).'/../smarty_plugins');
    if (is_dir($dir)) {
    	$this->addPluginsDir($dir);
    }
    
    $this->left_delimiter = '{{';
    $this->right_delimiter = '}}';
    
    $this->default_modifiers = array('default:""');    
    
    $security = new \Smarty_Security($this);
    // $security->php_functions[] = 'timelimit';
    // $security->php_functions[] = 'isempty';
    // $security->php_modifiers[] = 'sizeof';
    // $security->php_modifiers[] = 'print_r';
    // $security->php_modifiers[] = 'strtotime';
    // $security->php_modifiers[] = 'mb_strlen';
    // $security->trusted_dir = DIR_SMARTY_TEMPLATE;
    // $security->trusted_dir = DIR_BASE;
    $this->enableSecurity($security);
    
    // regiter_modifier
    // $smarty->registerPlugin('modifier', 'nf', 'number_format');
    // $smarty->registerPlugin('modifier', 'strotime', 'strtotime');
    // $smarty->registerPlugin('modifier', 's2t', 'strtotime');
    // $smarty->registerPlugin('modifier', 'strip_tags', 'strip_tags');
    
    $this->error_reporting = E_ALL & ~E_NOTICE;
    $this->escape_html = true;
    
    
    
  }

  /**
	 * Smarty::assign
	 *
	 * @param string $key
	 * @param string $value
	 */
    public function s($key, $value) {
    	return $this->assign($key, $value);
    }

	/**
	 * Smarty::fetch
	 *
	 * @param string $tpl
	 * @return string'
	 */
	public function f($tpl='') {
			if (empty($tpl)){
				$tpl=TplFile::path();
            }
			return $this->fetch($tpl);
	}  

	/**
	 * CSmarty::f and echo
	 *
	 * @param string $tpl
	 */
	public function e($tpl=''){
			if (empty($tpl)){
				$tpl=TplFile::path();
			}
			echo $this->f($tpl);
	}


}

