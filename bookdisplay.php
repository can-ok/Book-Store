<?php

$connection=mysqli_connect("localhost","root","","bookstore");

if(!$connection)
{
    echo("errror occuerd");
   
}

$query="SELECT * FROM book INNER JOIN author on author.id=book.authorId INNER JOIN publish ON publish.id=author.Publisher";
//SELECT book.isbn,book.bookname,author.name,publish.pubname FROM book 
//INNER JOIN author on author.id=book.authorId INNER JOIN publish ON publish.id=author.Publisher
$query_display=mysqli_query($connection,$query);

if(!$query_display)
{
    die("query failed".mysqli_error($connection));
}

    while($row=mysqli_fetch_array($query_display))
    {
        echo '<div class="col-4 product-grid">

		    <div class="image">
			    <a href="#">
                <img src="'.$row['resim'].'" > 
			</a>
		</div>
		<h4 class="text-center" id="result">'.$row['bookname'].'</h4>
        <h5>price:'.$row['price'].' tl'.'</h5>
        <h5>page:'.$row['sayfa'].'</h5>
        <h4>Yazar:'.$row['name'].'</h4>
        <h3>Yayın Evi:'.$row['pubname'].'</h3>
        <a href="#" class="btn buy">BUY</a>
        
	    </div>';
    }

?>