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
 if ( ! function_exists('random_color_part'))
{
    function random_color_part()
    {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }
}
if ( ! function_exists('random_color'))
{
    function random_color() 
    {
            $color_hex_code= random_color_part() . random_color_part() . random_color_part();
            return $color_hex_code;
    }
}