<?php
if(isset($_POST['submit']))
{
    echo "update";
    if($_FILES["resim"]["size"]<1024*1024)
        {
            if($_FILES["resim"]["type"]="image/jpeg"){
                if($_FILES["resim"]["type"]=="image/jpeg")
                {
                    $isbn=$_POST['isbn'];
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
                        $sql="UPDATE `book` SET `bookname`='$name', authorId = '$author' , sayfa='$pages',
                        price='$price' , resim='$yeni_ad' where isbn='$isbn'";
//UPDATE `book` SET `bookname`='alacakaranlık',`authorId`=3,`sayfa`=200,`price`=20,`resim`=' ' WHERE isbn=18
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
