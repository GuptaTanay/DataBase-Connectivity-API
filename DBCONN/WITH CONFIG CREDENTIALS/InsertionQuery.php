<?php
 // @author TANAY GUPTA
 // save this file in C://xampp/htdocs folder if you are running on local machine


require_once 'Config Credentials.php';

$conn = mysqli_connect(HOSTNAME,UNAME,PASS, DBNAME);
//returns a connection and has 4 arguments you can see [DONT TOUCH THE ABOVE LOC]

$query = "INSERT INTO TABLE_NAME(COLUMN_NAME1,COLUMN_NAME2)";
$query .= "VALUES('VALUE1','VALUE2')";
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

?>