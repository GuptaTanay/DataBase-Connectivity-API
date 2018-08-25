<?php
 // @author TANAY GUPTA
 // save this file in C://xampp/htdocs folder if you are running on local machine

$hostname= "localhost";		//link to your database site where you have hosted it
$username= "User";			//username of your host, where you have hosted your DB
$password= "pass";			//password of your host, where you have hosted your DB
$dbname= "database_name";	//name of your DB

$conn = mysqli_connect($hostname,$username, $password, $dbname);
//returns a connection and has 4 arguments you can see [DONT TOUCH THE ABOVE LOC]

$query = "Insert your query here";
$query .= "Concatenate query for readability if you want to";
// CHANGE ACCORDING TO YOUR QUERY

$result = mysqli_query($conn, $query);
// returns an int value on number of rows affected in DB

if($result > 0)  //basic check on either query has executed or not.
{
	echo "Query executed successfully";
}
else
{
	echo "Check the query or variable names in the query";  //message you want to  display
	echo mysqli_error($conn);  //Prints the type of error you have got
}

mysqli_close($conn);  //Close your connection

?>