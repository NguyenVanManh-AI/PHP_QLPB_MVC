<?php 
Class DB
{
    private $host;
    private $username ;
    private $password ;
    private $name_database;

    public function __construct()
    {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->name_database = "dulieupb2";
    }

    public function getConnection()
    {
        $link = mysqli_connect($this->host,$this->username,$this->password) or die ("Không thể kết nối đến CSDL MYSQL");
        mysqli_select_db($link,$this->name_database);
        return $link;
    }
}
?>