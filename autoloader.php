<?php
// abstract class Autoloader (pensez appeler dans controller la class)
/*
{
	
}
public static function autoloadClass($classe)
{
	require "model/". $classe . ".php";
}
public static function register() 
{
	spl_autoload_register("autoloadClass");	
}
*/


function autoloadClass($classe)
{
	require "model/". $classe . ".php";
}
spl_autoload_register("autoloadClass");	