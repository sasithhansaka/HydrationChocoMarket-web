<?php 
    include "conf.php";
    if(isset($_POST["insert"])){
        $name = $_POST["name"];
        $type = $_POST["type"];
        $qnt = $_POST["qnt"];
        $price = $_POST["price"];
        $description = $_POST["description"];

        if(!empty($_FILES["image1"]["name"])  && !empty($_FILES["image2"]["name"])){
            $filename1 = basename($_FILES["image1"]["name"]);
            $filetype1 = pathinfo($filename1, PATHINFO_EXTENSION);
            $allowTypes = array('jpg', 'png', 'jpeg', 'webp');
    if(in_array($filetype1, $allowTypes)){
                $image1 = $_FILES["image1"]["tmp_name"];
                $imgContent = addslashes(file_get_contents($image1));
                $filename2 = basename($_FILES["image2"]["name"]);
                 $filetype2 = pathinfo($filename2, PATHINFO_EXTENSION); 
                    if(in_array($filetype2, $allowTypes)){
                    $image2 = $_FILES["image2"]["tmp_name"];
                 $imgContent2 = addslashes(file_get_contents($image2));
           $sql = "INSERT INTO $type (name, quantity, image, price, description, image2) values ('$name', '$qnt', '$imgContent', '$price', '$description', '$imgContent2')";
                    $result = mysqli_query($conn, $sql);
                if($result){
                        echo "File uploaded successfully";
                    }
                    else{
                        echo "pload falied";
                    }
                }
                else{
                    echo "image format incorrect";
                }
            }
            else{
                echo "image format incorrect";
            }
        }
        else{
            echo "Please select an image";
        }
    }else{
    }
//     if(isset($_POST["update"])){
//         // $name = $_POST["name"];
//         // $size = $_POST["size"];
//         // $qnt = $_POST["qnt"];
//         // $price = $_POST["price"];
//         // $description = $_POST["description"];
// $id=$_POST["id"];
//         if(!empty($_FILES["image1"]["name"])  && !empty($_FILES["image2"]["name"])){
//             $filename1 = basename($_FILES["image1"]["name"]);
//             $filetype1 = pathinfo($filename1, PATHINFO_EXTENSION);

//             $allowTypes = array('jpg', 'png', 'jpeg', 'webp');
//             if(in_array($filetype1, $allowTypes)){
//                 $image1 = $_FILES["image1"]["tmp_name"];
//                 $imgContent = addslashes(file_get_contents($image1));

//                 $filename2 = basename($_FILES["image2"]["name"]);
//                 $filetype2 = pathinfo($filename2, PATHINFO_EXTENSION); 
//                 if(in_array($filetype2, $allowTypes)){
//                     $image2 = $_FILES["image2"]["tmp_name"];
//                     $imgContent2 = addslashes(file_get_contents($image2));

//                     $sql = "UPDATE bag SET  image='$imgContent',image2='$imgContent2' WHERE id='$id'";
//                     $result = mysqli_query($conn, $sql);

//                     if($result){
//                         echo "File updated successfully";
//                     }
//                     else{
//                         echo "pload falied";
//                     }
//                 }
//                 else{
//                     echo "image format incorrect";
//                 }
//             }
//             else{
//                 echo "image format incorrect";
//             }
//         }
//         else{
//             echo "Please select an image";
//         }
//     }else{

//     }
    if(isset($_POST["delete"])){
        $id = $_POST["id"];
        $sql = "DELETE FROM information WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "Record deleted successfully";
        } else {
            echo "Delete operation failed";
        }
    }
    else{

    }
    if(isset($_POST["deleteitem"])){
        $id = $_POST["id"];
        $sql = "DELETE FROM drinks WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "Record deleted successfully";
        } else {
            echo "Delete operation failed";
        }
    }
    else{

    }
    if(isset($_POST["confirm"])){
        $id = $_POST["id"];
        $sql = "UPDATE information SET current='ORDER DONE' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "Record  successfully";
        } else {
            echo " failed";
        }
    }
    
?>