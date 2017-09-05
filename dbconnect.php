<?php

	function connect(){
		 $con = mysql_connect("localhost","root","");
 	if($con){
 		$connect = mysql_select_db('dope_db');
 		
 	}
	}

		
?>