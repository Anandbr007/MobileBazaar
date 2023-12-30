<?php

// SETTING CONNECTION STRING
const SERVERNAME = "Localhost";
const USERNAME = "root";
const PASSWORD = "";
const DBNAME = "mobilebazaar";

// DTABASE CONNECTION CLASS
class DB_Con
{
    var $con;

    public function __construct()
    {
        // Create connection
        $this->con = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

        // Check connection
        if ($this->con->connect_error){
            die("Connection failed: " . $this->con->connect_error);
        }
    }
}
