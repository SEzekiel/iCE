<?php
include("dbconnect.php");

/*returns true if connection is okay else returns false*/
function connectionStatus()
{
    return $conn;
}

/*adds a row into a table and returns true if query was executed else returns false*/
function executeQuery($query)
{

    if (connectionStatus() == true)
        $result = mysqli_query($conn, $query);

    return $result;
}


/*returns a resultset: an object*/
function getResultSet($query)
{
    if (connectionStatus() == true) {
        $records = mysqli_query($conn, $query);

        if (mysqli_num_rows($records) > 0) {
            return $records;
        } else {
            return null;
        }

    }
}

?>