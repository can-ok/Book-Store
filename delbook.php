<?php
$connection=mysqli_connect("localhost","root","","bookstore");
if(!$connection)
{
    echo("error occuerd");
   
}

$search=$_POST['id'];

if(!empty($search))
{
    $query="Delete from book where isbn='$search'";
    $query_display=mysqli_query($connection,$query);

    if(!$query_display)
    {
        die('QUERY FAİLD'.mysqli_error($connection));
    }
}



?>