<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!function_exists('rupiah')) {
 function rupiah($angka){
 $hasil_rupiah = number_format($angka,0,',','.');
 return $hasil_rupiah;
 }
}

if (!function_exists('un_rupiah')) {
	function un_rupiah($angka)
	{
	    return (int)preg_replace("/\..+$/i", "", preg_replace("/[^0-9\.]/i", "", $angka));
	}
}
 ?>