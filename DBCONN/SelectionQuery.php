<?php
 // @author TANAY GUPTA
 // save this file in C://xampp/htdocs folder if you are running on local machine

$hostname= "localhost";		//link to your database site where you have hosted it
$username= "User";			//username of your host, where you have hosted your DB
$password= "pass";			//password of your host, where you have hosted your DB
$dbname= "database_name";	//name of your DB

$conn = mysqli_connect($hostname,$username, $password, $dbname);
//returns a connection and has 4 arguments you can see [DONT TOUCH THE ABOVE LOC]

$query = "SELECT COLUMN_NAME1,COLUMN_NAME2";
$query .= "FROM TABLE_NAME";
// CHANGE ACCORDING TO YOUR QUERY

$result = mysqli_query($conn, $query);
// returns an OBJECT from the DB

if($result && mysqli_num_rows($result) > 0)  
	//basic check on either query has executed or not.
{
	//while($row= mysqli_fetch_assoc($result))  //mysqli_fetch_assoc returns associative array for each record in DB
	//while($row= mysqli_fetch_array($result))  //mysqli_fetch_array returns mixed array for each record in DB
	while($row= mysqli_fetch_row($result))      //mysqli_fetch_row returns simple array for each record in DB
	{
		print_r($row);		//print_r function is used to print the type of array 
		
	}
	
	echo "Query executed successfully";
	mysqli_free_result($result);	//Good practice to free up the result after work done
}
else
{
	echo "No Record found";    //message you want to  display
	echo mysqli_error($conn);  //Prints the type of error you have got
}

mysqli_close($conn);  //Close your connection

?>