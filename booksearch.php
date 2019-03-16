<?php

$connection=mysqli_connect("localhost","root","","bookstore");

if(!$connection)
{
    echo("errror occuerd");
   
}

$search=$_POST['Search'];

if(!empty($search))
{

    $query="SELECT * FROM book INNER JOIN author ON author.id=book.authorId Where bookname LIKE '$search%'";

    //SELECT * FROM `book` INNER JOIN author ON author.id=book.authorId Where bookname LIKE
    $search_query=mysqli_query($connection,$query);
    $count=mysqli_num_rows($search_query);

    if(!$search_query)
    {
        die('QUERY FAİLD'.mysqli_error($connection));
    }

    if($count<=0)
    {
        echo "NOT FOUND";
    }
    while($row=mysqli_fetch_array($search_query)){

        

        echo '<div class="col-4 product-grid">
        
		    <div class="image">
			    <a href="#">
                <img src="'.$row['resim'].'" > 
			</a>
		</div>
		<h4 class="text-center" id="result">'.$row['bookname'].'</h4>
        <h5>price:'.$row['price'].'</h5>
        <h5>page:'.$row['sayfa'].'</h5>
        <h4>Yazar:'.$row['name'].'</h4>
        <a href="#" class="btn buy">BUY</a>
        
	</div>';
        
    }

}


?>