 <?php
session_start();
include_once 'connect.php';

if(!isset($_SESSION['user1']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user1']);
$userRow=mysql_fetch_array($res);
?>
 <?php 
error_reporting(0);	
 ?>

	<?php   
        $id = $_GET["txtid"];
        $name = trim($_POST['txtname']);		
		$email = trim($_POST['txtemail']);
		$address = trim($_POST['txtaddress']);
		$phone = trim($_POST['txtphone']);
		
		$sumprice = trim($_POST['txtsumprice']);

		$winprice = trim($_POST['txtwinprice']);
	
		$sprprice = trim($_POST['txtsprprice']);
		
		$season = trim($_POST['txtseason']);
		
        $type = trim($_POST['txttype']);
     //   $address = trim($_POST['txtaddress']);
		
        $feature = trim($_POST['txtfeature']);
		
		$picturename = $_POST['picturename'];
		
		$image_name  = $_FILES['file']['name'];
		$image_type  = $_FILES['file']['type'];
		$store       = rand(0,100000).$_FILES['file']['name'];
		$po_id = $userRow['po_id'];
        if(isset($_POST['cmdadd'])){
        if(empty($name) ||  empty($address) || empty($phone))
        {
            echo "<center>Sorry please input data</center>";
        }
		// else if ( $image_type == 'image/jpg' || $image_type == 'image/jpeg' || $image_type == 'image/gif' || $image_type == 'image/png')
			else
		{
        include "connect.php";
//		move_uploaded_file($_FILES['file']['tmp_name'],'img/'.$store);
	   $i = mysql_query("update student set stud_name='".$_POST['txtname']."', stud_email='".$_POST['txtemail']."', stud_address='".trim($_POST['txtaddress'])."', stud_phone='".$_POST['txtphone']."' where stud_id=".$id);
	   // $i = mysql_query("update property set p_name='".$_POST['txtname']."', p_type='".$_POST['txttype']."', address='".trim($_POST['txtaddress'])."', p_features='".$_POST['txtfeature']."', profile='".$store."', p_sumprice='".trim($_POST['txtsumprice'])."', p_winprice='".trim($_POST['txtwinprice'])."', p_sprprice='".trim($_POST['txtsprprice'])."', p_season='".trim($_POST['txtseason'])."' where p_id=".$_POST['txtid']);
	  if($i==true){
		  ?>
		  <script>alert('Update Successful');</script>
		  <?php
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=manage.php">';
        }
        //if($i==true){
        //header('Location:index.php');
        //exit;
        //mysql_close();
        //}
        }
    }
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Cottage</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<style>
ul#menu {
    padding: 0;
}

ul#menu li {
    display: inline;
}

ul#menu li a {
    background-color: black;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 4px 4px 0 0;
}

ul#menu li a:hover {
    background-color: orange;
}
</style>
</head>
<body>
<div id="header">
	<div id="left">
    <label>STUDENT ADMIN PAGE</label>
    </div>
    <div id="right">
    	<div id="content">
        		hi' <?php echo $userRow['user_name']; ?>&nbsp;<a href="student-admin-logout.php?logout">Sign Out</a>
        </div>
				    <div style="position:relative;right:800px;top:70px">  <ul id="menu">
  <li><a href="index.php">Home</a></li>
  <li><a href="edit-profile.php">Edit Profile</a></li>
   <li><a href="change_password.php">Change Password</a></li>
<!--   <li><a href="student.php">Student Page</a></li>  -->

</ul>
    </div>
    </div>
</div>

<center>
      <form action="" method="post" enctype="multipart/form-data">
   		<table class="table">
		<tr>
                
                <?php
				$eid= $_GET["txtid"];
				// echo $eid;
					include ("connect.php");
					$g = mysql_query("select * from student WHERE stud_id = '".$eid."'");
					while($id=mysql_fetch_array($g))
					{
				?>
                <br><br><br><br><br><br>
				<center><h1 style="color:black">Edit User</h3></center><br>
             <!--   	<th>Cottage ID</th>
                    <td><input type="text" name="txtid" value="<?php echo $id[0]; ?>" readonly="readonly" /></td>  -->
                </tr>
              
                <tr>
                	<th>Student Name</th>
                    <td><input type="text" name="txtname" value="<?php echo $id[2]; ?>" required /></td>
                </tr>
				
	<!--			<tr>
                	<th>Cottage Price</th>
                    <td><input type="text" name="txtprice" value="<?php echo $id[2]; ?>"  /></td>
                </tr>  -->
				
				<tr>
                	<th>Student Email</th>
                    <td><input type="text" name="txtemail" value="<?php echo $id[3]; ?>" readonly="true" /></td>
                </tr>
				
				<tr>
                	<th>Student Address</th>
                    <td><input type="text" name="txtaddress" value="<?php echo $id[5]; ?>" required /></td>
                </tr>
				
				<tr>
                	<th>Student Phone</th>
                    <td><input type="text" name="txtphone" value="<?php echo $id[6]; ?>" required /></td>
                </tr>
				
  <!-- 				<tr>
             	<th>Cottage Season</th>
                 <td><input type="text" name="txtseason" value="<?php echo $id[12]; ?>"  /></td>  
	   	
                    <td><select name="txtseason">
                    		<option>Select season</option>
                       		<option>summer</option>
                            <option>winter</option>
							<option>spring</option>
                       </select>
                    </td>               
                </tr>  -->
				
<!--	<tr>	
<th>Cottage Season</th>
<td>
    <select name="filter" id="filter" onchange="changeValue();">
<option id="summer" value="summer">summer</option>
<option id="winter" value="winter">winter</option>
<option id="spring" value="spring">spring</option>
</select>
<input type ='text' name="txtseason" id ="field" value ="<?php echo $id[10]; ?>" readonly="readonly"/>  
 <input type ='text' name="txtseason" id ="field" value ="Season"  />  
 

	</td>
		</tr>		-->		
				
				
<!--	<tr>	
<th>Cottage Price</th>
<td>
    <select name="filter" id="filter" onchange="changeValue();">
<option id="summer" value="summer">summer</option>
<option id="winter" value="winter">winter</option>
<option id="spring" value="spring">spring</option>
</select>

<input type ='text' name="txtprice" id ="field" value ="Price" />

	</td>
		</tr>		-->
				
      <!--         <tr>
                	<th>Cottage Type</th>
					<td><input type="text" name="txttype" value="<?php echo $id[2]; ?>" readonly="readonly" /></td>  
                    <td><select name="txttype">
                    		<option>Select Type</option>
                       		<option>1BHK</option>
                            <option>2BHK</option>
							<option>3BHK</option>
							<option>Suite</option>
                       </select>
                    </td>  
               </tr>  -->
	<!--	    <tr>
                	<th>Cottage Address:</th>
                    <td><textarea cols="19px" rows="3" name="txtaddress"> <?php echo $id[3]; ?>   </textarea></td>
                </tr>
				 <tr>
                	<th>Cottage Features:</th>
                    <td><textarea cols="19px" rows="3" name="txtfeature"> <?php echo $id[4]; ?> </textarea></td>
                </tr> -->
   		<!--		<tr>
   					<td>
   						<label>Picture Name</label>
   						<input type="text" name="picturename" value="<?php echo $id[6]; ?>"class="form-control">
   						
   					</td>  
					<th>Image :</th>
   					<td>
   						<label>Profile</label>
   						<input type="file" name="file" class="form-control" id="images">
   					
						<img id="blah" src="img/<?php echo $id[5]; ?>" alt="your image" style="width:140px;height:120px;" />
   					</td>
   					<td>
   					  <label>&nbsp;</label>
   					  <input type="submit" value="upload" class="btn btn-primary" name="upload"></td>  				
   				</tr> -->
				  <?php
					}
				?>
  <tr>
                    <td><input type="submit" name="cmdadd" value="Update" /></td>
     <!--               <td><input type="reset" name="cmdreset" value="Clear"/></td>  -->
                </tr>
   		</table>
   	 </form>

 <!--  	 <table class="table table-bordered table-hover">
   	 	 <thead>
   	 	 	 <tr>
   	 	 	 	 <th>ID</th>
   	 	 	 	 <th>PictureName</th>
   	 	 	 	 <th>Profile</th>
   	 	 	 	 <th>Action</th>
   	 	 	 </tr>
   	 	 </thead>
   	 	 <tbody>
   	 	 	 <?php 
   	 	 	 	$pic = mysql_query("SELECT * FROM tbpicture");
   	 	 	 	while($row = mysql_fetch_object($pic))
   	 	 	 	{
   	 	 	 		?>
   	 	 	 			<tr>
   	 	 	 			     <td><?= $row->p_id ?></td>
   	 	 	 			     <td><?= $row->picturename ?></td>
   	 	 	 			     <td><img src="img/<?= $row->profile ?>" style="width:100px;height:100px;"></td>
   	 	 	 			     <td><a href="edit.php?eid=<?= $row->id ?>">Edit</a>|<a onclick="return confirm('Are you sure?')" href="index.php?did=<?= $row->id ?>">Delete</a></td>
   	 	 	 			</tr>
   	 	 	 		<?php 
   	 	 	 	}
   	 	 	 ?>
   	 	 </tbody>
   	 </table>    -->

  </div>
</body>
</html>
     
<script type="text/javascript">
	$(function(){
		$("#images").change(function(){
            readURL(this);
	    });    
    });	

    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script type="text/javascript">
function changeValue(){
    var option=document.getElementById('filter').value;

    if(option=="summer"){
            document.getElementById('field').value="summer";
    }
        else if(option=="winter"){
            document.getElementById('field').value="winter";
        }
 else if(option=="spring"){
            document.getElementById('field').value="spring";
        }
}
</script>
