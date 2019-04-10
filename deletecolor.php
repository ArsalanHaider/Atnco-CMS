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
<h2 class="subtitle">Enter Details</h2><br/><br/>
<form class="shake" role="form" action="deletecolor.php" method="POST" data-toggle="validator">

<div class="form-group label-floating">
<label class="control-label" for="id">User Id</label>
<input class="form-control" id="id" type="text" name="id" required data-error="Please enter Email">
<div class="help-block with-errors"></div>
</div>




<div class="form-submit mt-4">
<button class="btn btn-primary" onclick()="return msg();" type="submit" name="delete" id="delete"><i class="material-icons mdi mdi-message-outline"></i>Delete Color</button>
<div id="msgSubmit" class="h3 text-center hidden"></div>
<div class="clearfix"></div>
</div>
</form>
</div>
</div>
</div>
</section>
<script>
function msg(){
    <div class="alert alert-success">User Deleted</div>
    return true;
}


</script>

<?php
   
if(isset($_POST['delete']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "threads";
    
    // get id to delete
    $id = $_POST['id'];
    
    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // mysql delete query 
    $query = "DELETE FROM `colorcode` WHERE `id` = $id";
    
    $result = mysqli_query($connect, $query);
    
    if($result)
    {
        echo '<div class="alert alert-primary">
        <strong>Data Deleted!</strong>.
         </div>';
    }else{
        echo '<div class="alert alert-danger">
        <strong>Data Not Deleted!</strong>.
         </div>';
    }
    mysqli_close($connect);
    echo "<script>window.location='deletecolor.php';</script>";

}


?>

<?php include('footer.php');?>