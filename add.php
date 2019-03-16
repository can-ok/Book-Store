<?php

    if($_POST)
    {
        if($_FILES["resim"]["size"]<1024*1024)
        {
            if($_FILES["resim"]["type"]="image/jpeg"){
                if($_FILES["resim"]["type"]=="image/jpeg")
                {
                    
                    $name=$_POST['book_name'];
                    $author=$_POST['book_authorId'];
                    $pages=$_POST['book_page'];
                    $price=$_POST['book_price'];
                    $dosya_adi=$_FILES["resim"]["name"];
                    $uret=array("as","rt","ty","yu","fg");
                    $uzanti=substr($dosya_adi,-4,4);
                    $sayi_tut=rand(1,10000);
                    $yeni_ad="dosyalar/".$uret[rand(0,4)].$sayi_tut.$uzanti;
                    if(move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){
                        echo "dosya yüklendi";
                        $connection=mysqli_connect("localhost","root","","bookstore");
                        $sql="INSERT INTO book(bookname,authorId,sayfa,price,resim) VALUES('$name','$author','$pages','$price','$yeni_ad')";

                        $query=mysqli_query($connection,$sql);
                        ?>
                        <a href="javascript:javascript:history.go(-1)">Geri dön</a>
                        <?php
                        
                        if(!$query)
                        {
                            echo "hata oluştu";
                        }

                    }
                    else{
                        echo "dosya yüklenmedi";
                    }


                }
                else{
                    echo "dosya jpeg olmalı";
                }
            }
        }
        
        else{
                echo "dosya büyük";
        }

    }
?>
