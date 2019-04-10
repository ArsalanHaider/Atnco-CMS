<?php include('header.php');  ?>
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
<form class="shake" role="form" action="addcolor.php" method="post" data-toggle="validator">

<div class="form-group label-floating">
<label class="control-label" for="name">Color Code</label>
<input class="form-control" id="code" type="text" name="code" required data-error="Please enter code">
<div class="help-block with-errors"></div>
</div>

<div class="form-group label-floating">
<label class="control-label" for="email">HEX Code</label>
<input class="form-control" id="hcode" type="text" name="hcode" required data-error="Please enter hex code">
<div class="help-block with-errors"></div>
</div>


<div class="form-submit mt-4">
<button class="btn btn-primary" onclick()="return msg();" type="submit" name="submit" id="submit"><i class="material-icons mdi mdi-message-outline"></i>Add Color</button>
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
    <div class="alert alert-success">Record inserted</div>
    return true;
}


</script>

<?php
 $servername = "localhost";
 $database = "threads";
 $username = "root";
 $password = "";
 
 // // Create connection
 
 $conn = mysqli_connect($servername, $username, $password, $database);
if(isset($_POST['submit'])){

    // Insert record
    $code = $_POST['code'];
    $hcode = $_POST['hcode'];
    $query = "INSERT INTO colorcode(code,hexcode) VALUES ('$code','$hcode')";
   $result= mysqli_query($conn,$query);
    if($result)
    {
        echo '<div class="alert alert-primary">
        <strong>Data Added!</strong>.
         </div>';
    }else{
        echo '<div class="alert alert-danger">
        <strong>Data Not Added!</strong>.
         </div>';
    }
    echo "000000000";
  }
 

?>

<?php include('footer.php');?>