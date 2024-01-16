<?php

class forAction extends DbConnection{
    public function CourseInsertData($table_name, $courseName){
        $sql1 = "SELECT * FROM ".$table_name." WHERE course_name LIKE '".$courseName."'";
        $res1 = mysqli_query($this->conn, $sql1);
        
        if(mysqli_num_rows($res1) > 0){
            return false;
        }else{
            $sql2 = "INSERT INTO ".$table_name." SET course_name='".$courseName."', status=true";
            $res2 = mysqli_query($this->conn, $sql2);
            if($res2){
                return true;
            }
        }
    }

    public function deleteData($table_name, $dataId){
        $sql = "SELECT * FROM ".$table_name." WHERE id LIKE '".$dataId."'";
        $res = mysqli_query($this->conn, $sql);

        if(mysqli_num_rows($res1) > 0){
            $sql1 = "DELETE FROM ".$table_name." WHERE id LIKE '".$dataId."'";
            $res1 = mysqli_query($this->conn, $sql);
            return true;
        }else{
            return false;
        }
    }
}

?>