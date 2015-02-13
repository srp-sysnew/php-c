<?php
/**
 * @param string $string
 * @return string escaped html string
 */
function smarty_modifier_escape_string($string, $esc_type = 'html', $char_set = 'UTF-8')
{
    if (is_string($string)) {    
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8', true);;
    }
    return $string;
}


