<?php

$connection=mysqli_connect("localhost","root","","bookstore");
if(!$connection)
{
    echo("error occuerd");
   
}

$query="Select * from book";
$query_display=mysqli_query($connection,$query);
if(!$query_display)
{
    die("query failed".mysqli_error($connection));
}

    while($row=mysqli_fetch_array($query_display))
    {

        echo "<tr>";
        echo "<td>".$row['isbn']."</td>";
        echo "<td><a href='#' rel='".$row['id']."' class='title-link'>".$row['bookname']."</a></td>";
        echo "<td>".$row['authorId']."</td>";
        echo "<td>".$row['sayfa']."</td>";
        echo "<td>".$row['price']."</td>";
        echo '<td><img src="'.$row['resim'].'" width=75 height=75> </td>';
        echo "<td><input type='button' href='javacript:void(0)' rel='".$row['isbn']."' class='btn btn-danger delete title-link' value='Delete'> </td>";
        echo "</tr>";


        


    }
?>
<script>
$(".title-link").on('click',function()
{
   var id=$(this).attr("rel");

   alert(id);

   $.ajax({
            url:'delbook.php',
            type:'POST',
            data:{id:id},
            success:function(book)
            {
            if(!book.error)
            {
                $('#show-books').html(book);
            }                 
            }
             });

});
</script>
