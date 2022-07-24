<?php 
    // call koneksi file
    include 'koneksi.php';
    // save query to string
    $query      = "SELECT b.ID as ID, b.UserName as UserName, a.UserName as ParentName FROM user as a RIGHT JOIN user as b ON a.ID = b.Parent";
    //
    $results    = mysqli_query($koneksi, $query);
    $result     = mysqli_fetch_array($results);
    $response   = array();
    $response["data"] = array();
    foreach($results as $row) { 
        array_push($response["data"], $row);
    }
        echo json_encode($response);
?>