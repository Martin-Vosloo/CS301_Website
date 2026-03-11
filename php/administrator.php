<?php
    require_once "connection.php";

    //this will return an arrao of 2 dimensions with the records in them and entered as the rows accordingly
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
    ?>
    <script>
        //getting the table results 
        const records = <?php echo table() ?>;
        //


        //this creates the table 
        function buildTable(records) {
            // let html = "<table border='0'>";
            records.forEach(row => {
                html += "<tr>";
                row.forEach(cell => {
                    html += "<td>" + cell + "</td>";
                });
                html += "</tr>";
            });

            html += "</table>";
            return html;
        }
        //adding dtaa top the table
        function initialTable_onload(){
            document.getElementById("curbooking").innerhtml = buildTable(records);
        }