<?php 

class BaseModel {

    protected $dbcon;


    public function __construct()
    {
        $dbconnection = new DbConnection;
        $this->dbcon = $dbconnection ->connect();
    }

}