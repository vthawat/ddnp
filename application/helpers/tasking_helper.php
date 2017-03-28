<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * prename
 *
 * Lets you determine whether an array index is set and whether it has a value.
 * If the element is empty it returns FALSE (or whatever you specify as the default value.)
 *
 * @access	public
 * @param	interger
 * @return	string	prename on what the array contains
 */

 if ( ! function_exists('task_color'))
{
	function task_color($percent_commit)
	{
        $task_color='';
        if($percent_commit<=30) $task_color="progress-bar-red";
        elseif($percent_commit<=50) $task_color="progress-bar-yellow";
         elseif($percent_commit<=80) $task_color="progress-bar-aqua";
         elseif($percent_commit<=100) $task_color="progress-bar-green";
        
        return $task_color;
        

	}
}