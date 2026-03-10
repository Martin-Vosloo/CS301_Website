<?php
    require_once "connection.php";
    //this will return an arrao of 2 dimensions 
    function table($feild = "fname", $order = "ASC", $sign = "<" ){
        $sql = "SELECT fname, lname, start_date, duration 
                FROM users inner join booking on users.identityNumber=booking.idNo 
                where start_date ? NOW()
                Order by ? ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $sign, $feild, $order);
        $stmt->execute();
        $result = $stmt.get_result();
        if($result->num_rows>0){
            $rows = [];
            while ($row = $result->fetch_assoc()) {
              $rows[] = $row;
            }
        }else{
            return [-1];
        }
        return $rows;
    }