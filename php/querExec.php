<?php
//this will be a function that will be used to execute all the queries possible,
//this is intentionally done so to make it easier to restrict functions executed on the database
//this strictly enforces the use of prepared SQL statements
require "connection.php"


/*
 reruns -1 if there are no results from the query
 returns the results otherwise
*/
function queryExecute($query){
    $result = mysqli_query($conn, $query);
    //using ternary operator to check if there are any results from the query
    return = (mysqli_num_rows($result)>0)? result: "-1";
}