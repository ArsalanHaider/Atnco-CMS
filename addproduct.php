 <?php include('header.php')  ?>
 <?php 
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from users where id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

 ?>
<body>

<?php include('sidebar.php')  ?>

<section class="Material-contact-section section-padding">
<div class="container">

<div class="row mt-5">
<div class="col-md-6  wow fadeInUp animated" data-wow-delay=".5s">
<h2 class="subtitle">Enter Details</h2>
<form class="shake" role="form" method="post" action="" enctype="multipart/form-data" data-toggle="validator">

<div class="form-group label-floating">
<label class="control-label" for="name">Product Name</label>
<input class="form-control" id="pname" type="text" name="pname" required data-error="Please enterProduct Name">
<div class="help-block with-errors"></div>
</div>

<div class="form-group label-floating">
<label class="control-label" for="email">Product Detail</label>
<input class="form-control" id="hcode" type="detail" name="detail" required data-error="Please enter Product Detail">
<div class="help-block with-errors"></div>
</div>

<div class="form-group label-floating">
<label class="control-label" for="email">Select Image</label>
<input class="form-control" type="file" name="image" id="image" required data-error="Please Select Image">
<div class="help-block with-errors"></div>
</div>

<div class="form-submit mt-4">   
<button id="submit" type='submit'  class="btn btn-primary" onclick()="return msg();" name='but_upload'><i class="material-icons mdi mdi-message-outline"></i>Add Color</button>
<div id="msgSubmit" class="h3 text-center hidden"></div>
<div class="clearfix"></div>
</div>
</form>
</div>
</div>
</div>


<script>
function msg(){
    <div class="alert alert-success">Record inserted</div>
    return true;
}


</script>
</section>



<?php
if(isset($_POST["but_upload"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $pname = $_POST['pname'];
        $detail = $_POST['detail'];
        /*
         * Insert image data into database
         */
        
        $servername = "localhost";
        $database = "threads";
        $username = "root";
        $password = "";
        
        // // Create connection
        
        $conn = mysqli_connect($servername, $username, $password, $database);
        
        // Check connection
        if($conn->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        
        //Insert image content into database
        $insert = $conn->query("INSERT into product (pname,detail,pimage) VALUES ('$pname','$detail','$imgContent')");
        if($insert){
            echo '<div class="alert alert-primary">
                     <strong>Data Added!</strong>.
                   </div>';
        }else{
            echo '<div class="alert alert-danger">
                 <strong>Data Not Added!</strong>.
                   </div>';
        } 
    }else{
        echo "Please select an image file to upload.";
    }
    echo "<script>window.location='addproduct.php';</script>";

}
?>
<?php
//  $servername = "localhost";
//  $database = "threads";
//  $username = "root";
//  $password = "";
 
//  // // Create connection
 
//  $conn = mysqli_connect($servername, $username, $password, $database);
// if(isset($_POST['but_upload'])){
 
//   $name = $_FILES['file']['name'];
//   $target_dir = "upload/";
//   $target_file = $target_dir . basename($_FILES["file"]["name"]);

//   // Select file type
//   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//   // Valid file extensions
//   $extensions_arr = array("jpg","jpeg","png","gif");

//   // Check extension
//   if( in_array($imageFileType,$extensions_arr) ){
 
//     // Convert to base64 
//     $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
//     $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
//     // Insert record
//     $pname = $_POST['pname'];
//     $detail = $_POST['detail'];
//     $query = "insert into product(pname,detail,pimage)VALUES ('$pname','$detail','$image')";
//     $result= mysqli_query($conn,$query);
//     if($result)
//     {
//         echo '<div class="alert alert-primary">
//         <strong>Data Added!</strong>.
//          </div>';
//     }else{
//         echo '<div class="alert alert-danger">
//         <strong>Data Not Added!</strong>.
//          </div>';
//     }
  
//     // Upload file
//     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
//     echo "<script>window.location='addproduct.php';</script>";


//   }
 
// }
// ?>


<?php include 'footer.php';?>