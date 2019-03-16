<?php
$connection=mysqli_connect("localhost","root","","bookstore");
$msg="";

$query="Select * from book";
$result= mysqli_query($connection,$query);
if(isset($_POST["upload"]))
{
    
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Css/style.css">        
    <link rel="stylesheet" type="text/css" href="Bootstrap\css\bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Bootstrap\css\bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="Bootstrap\css\bootstrap-grid.min.css">        
    <link rel="stylesheet" type="text/css" href="Bootstrap\css\bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="Bootstrap\css\bootstrap-reboot.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    <script
    src="https://code.jquery.com/jquery-2.2.4.js"
    integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>


        <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                 <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link" href="home.html">Home </a>
                          <a class="nav-item nav-link" href="about.html">About</a>
                          <a class="nav-item nav-link" href="Form.html">Form</a>
                          <a class="nav-item nav-link" href="books.html">Books</a>
                          <a class="navbar-brand" href="admin.html">ADMİN</a>
                    </div>
                  </div>
                      <img class="logo" src="logo.png">
            </nav>

            <div class="row">
                    <div class="col-sm-8">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th>ISBN</th>
                                    <th>Name</th>
                                    <th>AuthorID</th>
                                    <th>Page</th>
                                    <th>Price</th>
                                    <th>image</th>
                                    </tr>
                                </thead>
                                <tbody id="show-books">
                                <form method="Get" enctype='multipart/form-data' action="add.php">
                                <?php
                                while($row=mysqli_fetch_array($result))
                                    {
                                    //echo '<form action="index.php?sayfa=display_book" method="post" name="form1">';
                                        echo "<tr>";
                                        echo "<td >".$row['isbn']."</td>";
                                        echo "<td value=".$row['bookname']."><a href='#' rel='".$row['isbn']."' class='title-link'>".$row['bookname']."</a></td>";
                                        echo "<td>".$row['authorId']."</td>";
                                        echo "<td>".$row['sayfa']."</td>";
                                        echo "<td>".$row['price']."</td>";
                                        echo '<td><img src="'.$row['resim'].'" width=75 height=75> </td>';
                                        //echo "<td><input type='submit' name='submit' class='btn btn-success update title2-link' value='submit'> </td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                                </form>
                            </table>
                            
                        </div>
                    <div class="col-sm-4">

                    <form method="post" id="add-book-form" class="col-x-6" action="Update.php" enctype="multipart/form-data">
                                    <h1>Add a Book</h1>
                                    <div class="form-group">
                                    <label for="isbn">UpdateID:</label>
                                      <input type="text" name="isbn" class="form-control" >
                                     <label for="book_name">Name</label>
                                      <input type="text" name="book_name" class="form-control" >
                                      <label for="book_authorId">AuthorID</label>
                                      <input type="text" name="book_authorId" class="form-control" >
                                      <label for="book_page">page</label>
                                      <input type="text" name="book_page" class="form-control" >
                                      <label for="book_price">Price</label>
                                      <input type="text" name="book_price" class="form-control" >
                                      <label for="image">image</label>
                                      <input type="file" name="resim" class="form-control" > 
                                    </div>
                                      <div class="form-group">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Kaydet">
                                     </div>
                                       
                                </form>
                    </div>

                    
            </div>
        </div>
    </div>

</body>
</html>