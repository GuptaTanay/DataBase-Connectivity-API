<?php
 // @author TANAY GUPTA
 // save this file in C://xampp/htdocs folder if you are running on local machine

 $data= array();	//create an array with the name of $data
 
 #region variables
$hostname= "localhost";		//link to your database site where you have hosted it
$username= "User";			//username of your host, where you have hosted your DB
$password= "pass";			//password of your host, where you have hosted your DB
$dbname= "database_name";	//name of your DB
#end_region

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
	$records = array();	//create an array with name $records
	while($row= mysqli_fetch_array($result))  //mysqli_fetch_array returns mixed array for each record in DB
	{
		$records[] = $row;  	//the rows fetched from the DB are given to records in the form of associative array
	}
	$data["records"] = $records;	//put the records array in data array
	$data["message"] = "Records found";
	
	mysqli_free_result($result);	//Good practice to free up the result after work done
}
else
{
	$data["message"] = "No Record found";    //message you want to  display
	//echo mysqli_error($conn);  //Prints the type of error you have got
}

mysqli_close($conn);  //Close your connection

header("content-type:application/json"); 	//header function runs for every PHP file
											//and here we are setting the MIME type to be displayed

echo json_encode($data);		//encodes the data into json format											
?>