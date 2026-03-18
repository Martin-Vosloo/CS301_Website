<?php
require_once "reporting.php";

<<<<<<< HEAD
    //this will return an arrao of 2 dimensions with the records in them and entered as the rows accordingly
    function table($feild = "fname", $order = "ASC", $sign = "<" ){
        $sql = "SELECT fname, lname, start_date, duration 
                FROM users inner join booking on users.identityNumber=booking.idNo 
                where start_date ? NOW() and alive=1
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
        let clicked_record;


        //this creates the table 
        function buildTable(records) {
            let html = "<table border='1' id='curTable'>";
            records.forEach((row, rowIndex) => {
                html += "<tr data-index='" + rowIndex + "'>";
                row.forEach(cell => {
                html += "<td>" + cell + "</td>";
                });
                html += "</tr>";
            });
            html += "</table>";
            return html;
        }

        function renderTable(records) {
            document.getElementById("curbooking").innerHTML = buildTable(records);
            document.querySelectorAll("#curTable tr").forEach(tr => {
                tr.addEventListener("click", clicked_on_table());
            });
        }



        //adding dtaa top the table
        function initialTable_onload(){
            document.getElementById("curbooking").innerhtml = renderTable(records);
        }




//buttons under the first table 
//these functions use php and js at the same time i am not completely sure about them

        //order by date button
        document.getElementById("orderDate").addEventListener("click", function(){
            document.getElementById("curbooking").innerhtml = renderTable( json_encode(<?php echo table("start_date")?>) );
        })

        //order by name, since the default is first name we will change this to last name
        document.getElementById("orderName").addEventListener("click", function(){
            document.getElementById("orderName").innerhtml = renderTable(json_encode(<?php echo table("lname")?>));
        })

        //search button
        document.getElementById("seach").addEventListener("click", function(){
            document.getElementById("search").innerhtml = renderTable(search_result());
        })


        function search_results(){
            //getting the search value
            const search_string = document.getElementbyId("searchValue").value;            
            return records.filter((row, index) => {
                if (index === 0) return true; // keep header row
                return row.some(cell =>
                    cell.toString().toLowerCase().includes(search_string.toLowerCase())
                );
            });
        }


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /*these are for specifically the modifying part of the 
        */

        //firstly you click on the table and then it bappears on the section
        function clicked_on_table(){
            //getting the clicked item
            const index = this.getAttribute("data-index");
            clicked_record = records[index];
            //

                // Show the record in another section for editing
                document.getElementById("selectedRecord").innerText = record.join(" | ");
        }
=======
// Legacy helper retained for compatibility.
function table()
{
    return fetchBookingReportRows();
}
?>
>>>>>>> 35f966bd709081ca7c438189794926bfff8e8581
