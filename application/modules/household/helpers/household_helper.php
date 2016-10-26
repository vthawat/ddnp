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
if ( ! function_exists('prename'))
{
	function prename($item)
	{
		$prename_array=array('1'=>'นาย','2'=>'นาง','3'=>'นางสาว');
		if(empty($prename_array[$item])) return FALSE;
		return $prename_array[$item];
	}
}


if ( ! function_exists('patient_prename'))
{
	function patient_prename($item)
	{
		$patient_prename_array=array('1'=>'นาย','2'=>'นาง','3'=>'นางสาว');
		if(empty($patient_prename_array[$item])) return FALSE;
		return $patient_prename_array[$item];
	}
}


/**
 * home_type_checked
 *
 * Lets you determine whether an array index is set and whether it has a value.
 * If the element is empty it returns FALSE (or whatever you specify as the default value.)
 *
 * @access	public
 * @param	interger
 * @return	string	prename on what the array contains
 */
if ( ! function_exists('home_type_checked'))
{
	function home_type_checked($hometype)
	{
		if($hometype) return '<i class="fa fa-check-square-o"></i>';
		else return '<i class="fa fa-square-o"></i>';
	}

}
/**
 * attitude_level_checked
 *
 * Lets you determine whether an array index is set and whether it has a value.
 * If the element is empty it returns FALSE (or whatever you specify as the default value.)
 *
 * @access	public
 * @param	interger
 * @return	string	prename on what the array contains
 */
if ( ! function_exists('attitude_level_checked'))
{
	function attitude_level_checked($level)
	{
		if($level) return '<i class="fa fa-check-square-o"></i>';
		else return '<i class="fa fa-square-o"></i>';
	}

}

if ( ! function_exists('affliction_checked'))
{
	function affliction_checked($level)
	{
		if($level=='1'||$level!='0') return '<i class="fa fa-check-square-o"></i>';
		else return '<i class="fa fa-square-o"></i>';
	}

}
if ( ! function_exists('avocation_checked'))
{
	function avocation_checked($level)
	{
		if($level=='1'||$level!='0') return '<i class="fa fa-check-square-o"></i>';
		else return '<i class="fa fa-square-o"></i>';
	}

}

if ( ! function_exists('fugitive_prename'))
{
	function fugitive_prename($item)
	{
		$prename_array=array('1'=>'นาย','2'=>'นาง','3'=>'นางสาว','4'=>'เด็กชาย','5'=>'เด็กหญิง');
		if(empty($prename_array[$item])) return FALSE;
		return $prename_array[$item];
	}
}

if ( ! function_exists('fugitive_status'))
{
	function fugitive_status($item)
	{
		$fugitive_status_array=array('0'=>'ไม่มี','1'=>'ป.วิอาญา','2'=>'พรก.','3'=>'ระแวง');
		if(empty($fugitive_status_array[$item])) return FALSE;
		return $fugitive_status_array[$item];
	}
}



