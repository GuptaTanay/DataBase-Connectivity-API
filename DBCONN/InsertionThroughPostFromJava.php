<?php
 // @author TANAY GUPTA
 // save this file in C://xampp/htdocs folder if you are running on local machine

 if(isset($_POST["f_name"]) && isset($_POST["f_name"]))    //isset function checks if a variable is declared or not, returns true or false
 {
	$firstname= trim($_POST["f_name"]);		//take care of the parameters
	$lastname= trim($_POST["l_name"]);		//parameter name must be same which is sent by AddPostRequest.java
	//trim function is used to clean up the extra  spaces in the left or right of thr variable
	
	
	if(empty($firstname) || empty($lastname))
	{
		echo "Please enter some value";
	}		
	else
	{
 
	$hostname= "localhost";		//link to your database site where you have hosted it
	$username= "User";			//username of your host, where you have hosted your DB
	$password= "pass";			//password of your host, where you have hosted your DB
	$dbname= "database_name";	//name of your DB

	$conn = mysqli_connect($hostname,$username, $password, $dbname);
	//returns a connection and has 4 arguments you can see [DONT TOUCH THE ABOVE LOC]

	#region SQL INJECTION STOPPING
	//stopping SQL INJECTION IN PHP
	$firstname = mysqli_escape_string($query, $firstname); 		//this function checks for the character or sequence which can inject the sql query
	$lastname = mysqli_escape_string($query, $lastname);		//and escapes it from the query and sends the data as submitted to the DB
	//stopped
	#end_region
	
	$query = "INSERT INTO Name(first name,last name)";
	$query .= "VALUES('{firstname}','{lastname}')";
	// CHANGE ACCORDING TO YOUR QUERY

	$result = mysqli_query($conn, $query);
	// returns an int value on number of rows affected in DB

	if($result > 0)  
	//basic check on either query has executed or not.
	{
		echo "Query executed successfully";
	}
	else
	{
		echo "Check the query or variable names in the query";  //message you want to  display
		echo mysqli_error($conn);  //Prints the type of error you have got
	}

	mysqli_close($conn);  //Close your connection	
 }
 
 } else
 {
	 echo "Query String variable mismatch" ;
 }
?>