<?php

function autoloadClass($classe)
{
	require "model/". $classe . ".php";
}
spl_autoload_register("autoloadClass");	


