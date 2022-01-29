<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tata Cara Persyaratan</title>
</head>
<body>
   
   <?php
    $conn = mysqli_connect('localhost','root','','intern');
    if(isset($_POST['upload'])){
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $path = "filePersyaratan/".$fileName;
        
        $query = "INSERT INTO persyaratan(TCpersyaratan) VALUES ('$fileName')";
        $run = mysqli_query($conn,$query);
        
        if($run){
            move_uploaded_file($fileTmpName,$path);
            echo "success";
        }
        else{
            echo "error".mysqli_error($conn);
        }
        
    }
    
    ?>
   
   <table border="1px" align="center">
       <tr>
           <td>
               <form action="persyaratan.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <button type="upload" name="upload"> Upload</button>
                </form>
           </td>
       </tr>
       <tr>
           <td>
              <?php
               $query2 = "SELECT * FROM persyaratan ";
               $run2 = mysqli_query($conn,$query2);
               
               while($rows = mysqli_fetch_assoc($run2)){
                   ?>
               <a href="downloadPersyaratan.php?file=<?php echo $rows['TCpersyaratan'] ?>">Download</a><br>
               <?php
               }
               ?>
           </td>
       </tr>
   </table>
    
</body>
</html>