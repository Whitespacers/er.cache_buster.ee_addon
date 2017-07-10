<?php
// ini_set('display_errors',E_ALL);

/**
 * Cache Buster
 *
 * This file must be placed in the
 * system/plugins/ folder in your ExpressionEngine installation.
 *
 * @package CacheBuster
 * @version 2.0.0
 * @author Erik Reagan http://erikreagan.com
 * @copyright Copyright (c) 2010 Erik Reagan
 * @see http://erikreagan.com/projects/cache_buster/
 * @license http://creativecommons.org/licenses/by-nd/3.0/ Creative Commons Attribution-No Derivative Works 3.0 Unported
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cache_buster
{

   public $return_data;

   public function __construct()
   {

      $file = (ee()->TMPL->fetch_param('file') != '') ? ee()->TMPL->fetch_param('file') : FALSE ;
      $separator = (ee()->TMPL->fetch_param('separator') != '') ? ee()->TMPL->fetch_param('separator') : '?v=' ;
      $root_path = (ee()->TMPL->fetch_param('root_path') != '') ? ee()->TMPL->fetch_param('root_path') : $_SERVER['DOCUMENT_ROOT'] ;
      $time = @filemtime($root_path.ee()->security->xss_clean(html_entity_decode($file)));

      if ($file)
      {
         $return = $file;
         if ($time !== FALSE)
         {
            $return .= $separator . $time;
         }
      }

      $this->return_data = $return;

   }

}

/* End of file mod.cache_buster.php */
