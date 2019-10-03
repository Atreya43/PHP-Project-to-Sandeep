<?php
/*
	By using this class we can create new database as well as new table and add the products and it's details */
/* 
	We are using this instade of phpmyadmin and its database we are creating user interfaced data base
	we are creating new php module to create the database*/
/*
	Creating new database using php script
*/
class CreateDb
{
	public$servername;// creating new property and it's scope that is public
	public$username;
	public$password;
	public$dbname;
	public$tablename;
	public$con;//Connection

	//class constructor

	public function __construct(
		$dbname="Newdb",
		$tablename="Productdb",
		$servername="localhost",
		$username="root",
		$password=""
		//Initializing the arguments by those upside properties
	)
	{
		$this->dbname=$dbname;
		$this->tablename=$tablename;
		$this->servername=$servername;
		$this->username=$username;
		$this->password=$password;//these all are constuctors...

		//creating connection
		//calling those properties

		$this->con=mysqli_connect($servername,$username,$password);

		//check connection
		if (!$this->con) 
		{
			die("Connection Fail:".mysqli_connect_error());
		}

		//Query use to  create new database:---

		$sql="CREATE DATABASE IF NOT EXISTS $dbname";

		//Execute Query


		if(mysqli_query($this->con,$sql))
		{
			$this->con = mysqli_connect($servername,$username,$password,$dbname);

			//creating new table

			$sql="CREATE TABLE IF NOT EXISTS $tablename(id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			product_name VARCHAR(25) NOT NULL,
			base_price FLOAT,
			product_price FLOAT,
			product_image VARCHAR(100));";

			if(!mysqli_query($this->con,$sql))
			{
					echo "Error Creating Table".mysqlierror($this->con);
			}

		}
		else
		{
			return false;
		}

	}
	//get product from database THIS IS FOR GETTING THE DETAILS OF THE DIFFERENT PRODUCTS FROM THE DATABASE AND SHOW ON THE WEB PAGE
	public function getData()
	{
		$sql="SELECT * FROM $this->tablename";

		$result=mysqli_query($this->con,$sql);

		if(mysqli_num_rows($result)>0)
		{
			return $result;
		}
	}
}

?>