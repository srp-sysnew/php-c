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
    
    $this->left_delimiter = '{{';
    $this->right_delimiter = '}}';
    
    $this->default_modifiers = array('default:""');
    
  }
}
