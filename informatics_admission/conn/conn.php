<?php
class DbConnection{
    public $conn;
    public function __construct(){
        session_start();

        date_default_timezone_set('Asia/Manila');

        $getTime = date("Y-d-m h:i:sa");
        
        $this->dbhost = "127.0.0.1";
        $this->dbuser = "root";
        $this->dbpass = "";
        $this->dbname = "informatics_admission";

        $this->conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname) or die("error");
        
    } 
}

class forAction extends DbConnection{
    public $conn;
    public function CourseInsertData($table_name, $courseName, $courseDesc){
        $cname = addslashes($courseName);
        $cdesc = addslashes($courseDesc);
        $sql1 = "SELECT * FROM $table_name WHERE course_name LIKE '$cname' AND course_desc LIKE '$cdesc'";
        $res1 = mysqli_query($this->conn, $sql1);
        
        if(mysqli_num_rows($res1) > 0){
            return false;
        }else{
            $sql2 = "INSERT INTO $table_name SET course_name='$cname', course_desc='$cdesc', status=true";
            $res2 = mysqli_query($this->conn, $sql2);
            if($res2){
                return true;
            }
        }
    }

    public function deleteData($table_name, $dataId){
        $sql = "SELECT * FROM $table_name WHERE id='$dataId'";
        $res = mysqli_query($this->conn, $sql);

        if(mysqli_num_rows($res) > 0){
            $sql1 = "DELETE FROM $table_name WHERE id='$dataId'";
            $res1 = mysqli_query($this->conn, $sql1);
            if($res1){
                return true;
            }
        }else{
            return false;
        }
    }

    public function getSingleData($table_name, $dataId){
        $sql = "SELECT * FROM $table_name WHERE id='$dataId'";
        $res = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($res) > 0){
            return $res;
        }else{
            return false;
        }
    }

    public function updateData($table_name, $dataId){
        $sql = "SELECT * FROM $table_name WHERE id='$dataId'";
        $res = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($res) > 0){
            return true;
        }else{
            return false;
        }
    }

    public function insertData($checkSql, $insertSql){
        $sql1 = $checkSql;
        $res1 = mysqli_query($this->conn, $sql1);
        
        if(mysqli_num_rows($res1) > 0){
            return false;
        }else{
            $sql2 = $insertSql;
            $res2 = mysqli_query($this->conn, $sql2);
            if($res2){
                return true;
            }
        }
    }

    public function simpleInsert($insertSql){
        $sql = $insertSql;
        $res = mysqli_query($this->conn, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    }
}
?>