<!DOCTYPE html>
<html>
<head>
<title> Image Uploading Example </title>
</head>
<body>
    <form action="image.php" method="POST" enctype="multipart/form-data">
        File : 
        <input type="file" name="image"> 
        <input type="submit" value="Upload">
    </form>name
    
    <?php
    
    $con = mysqli_connect("localhost","root","568015as","db") or die(mysqli_connect_error());
    
    $file = $_FILES['image']['tmp_name'];
    
    if(!isset($file)) {
        echo "Please select an image.";
    }
    else {
        $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name = addslashes($_FILES['image']['iname']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);
        
        if($image_size == FALSE) {
            echo "That's not an image.";
        }
        else {
            $sql = "INSERT INTO images VALUES(NULL,'$image_name','$image_data')" ;
                
            if ( !mysqli_query($con,$sql) ) {
                echo "Problem in uploading image !." . mysqli_error($con);
            }
            else {
                echo "<p> Your Image : $image_name </p>";
                // using separate php file 
                echo "<img width='200' height='200' src='get.php?iname=$image_name'>";

                // using direct display 
                // $image = mysqli_query($con, "SELECT * FROM images WHERE name='$image_name'");
                // $image = mysqli_fetch_array($image);
                // echo "<img src='data:image/jpeg;base64," . base64_encode($image['data']) . "' width='250' height='200' />";

               
            }
        }    
    }
    
    ?>
</body>
</html>