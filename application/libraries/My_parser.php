<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Parser Class
 *
 * @package  CodeIgniter
 * @subpackage Libraries
 * @category Parser
 * @author  ExpressionEngine Dev Team
 * @link  http://codeigniter.com/user_guide/libraries/parser.html
 */
class MY_Parser extends CI_Parser {

 var $tpl_vars = array();

 // --------------------------------------------------------------------

 /**
  *  Parse a template
  *
  * Parses pseudo-variables contained in the specified template,
  * replacing them with the data in the second param
  *
  * @access public
  * @param string
  * @param array
  * @param bool
  * @return string
  */
 function _parse($template, $data, $return = FALSE)
 {
  if ($template == '')
  {
   return FALSE;
  }

  // Capture all the possible vars from the template file
  preg_match_all("/{(.*?)}/", $template, $this->tpl_vars);
  $this->tpl_vars = $this->tpl_vars[1];
  
  foreach ($data as $key => $val)
  {
   if (is_array($val))
   {
    $template = $this->_parse_pair($key, $val, $template);
   }
   else
   {
    $template = $this->_parse_single($key, (string)$val, $template);
   }
  }

  // All the remaining template vars should be stripped from the code if they are not set
  $template = $this->_strip_undefined_vars($template);
  
  if ($return == FALSE)
  {
   $CI =& get_instance();
   $CI->output->append_output($template);
  }

  return $template;
 }

 // --------------------------------------------------------------------

 /**
  *  Parse a single key/value
  *
  * @access private
  * @param string
  * @param string
  * @param string
  * @return string
  */
 function _parse_single($key, $val, $string)
 {
  // Remove this element from the template vars
  $this->tpl_vars = array_diff($this->tpl_vars, array($key));
  
  return str_replace($this->l_delim.$key.$this->r_delim, $val, $string);
 }
 
 function _strip_undefined_vars($template)
 {
  foreach ($this->tpl_vars as $val)
   $template = str_replace($this->l_delim.$val.$this->r_delim, '', $template);
  return $template;
 }
}
// END Parser Class

/* End of file Parser.php */
/* Location: ./application/libraries/MY_Parser.php */ 