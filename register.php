<?php
@session_start();
ob_start();
$con = mysql_connect("localhost","root","") or die("mysql not connected");
mysql_select_db("test",$con) or die("database not connected");


if(isset($_POST['button']))
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mobile = $_POST['mobile'];
		$emailid = $_POST['emailid'];
		
		
		//$hobbies = $_POST['hobbies'];
		$chk = $_POST['chk'];
		$hobbies = implode(",",$chk);
		
		$password = $_POST['password'];
		
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$gender = $_POST['gender'];
		
		$userfile = $_FILES['userfile']['name'];
		//$_FILES['userfile']['type'];
		//$_FILES['userfile']['size'];
		$tmp = $_FILES['userfile']['tmp_name'];
		///$userfile = $_POST['userfile'];
		move_uploaded_file($tmp,"upload/".$userfile);
		//copy($tmp,"upload/".$userfile);
		
		$state = $_POST['state'];
		$postdate = $_POST['postdate'];
		$status = $_POST['status'];
		


$query = "INSERT INTO `tbl_register` (`id`, `fname`, `lname`, `mobile`, `emailid`, `hobbies`, `password`, `dob`, `address`, `gender`, `userfile`, `state`, `postdate`, `status`) VALUES (NULL, '$fname', '$lname', '$mobile', '$emailid', '$hobbies', '$password', '$dob', '$address', '$gender', '$userfile', '$state', NOW(), '0')";		
		
		$data = mysql_query($query);
		if($data)
			{
				echo "success";
				}
		
		}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="50%" border="1" align="center">
    <tr>
      <td height="40" colspan="3" align="center"><strong>User Registration Form</strong> 
      <a href="show_result.php"><input type="button" name="show" id="show" value="Show All Record" /></a>
        <br />
      <strong><span style="color:#F00;">
      <?php
	  /*if(isset($_POST['button']))
{
	user_register();
	}*/
	  ?>
      </span></strong>
      </td>
    </tr>
    <tr>
      <td height="40" align="center">First Name</td>
      <td height="40" align="center">&nbsp;</td>
      <td height="40" align="center"><input type="text" name="fname" id="fname" /></td>
    </tr>
    <tr>
      <td height="40" align="center">Last Name</td>
      <td height="40" align="center">&nbsp;</td>
      <td height="40" align="center"><input type="text" name="lname" id="lname" /></td>
    </tr>
    <tr>
      <td height="40" align="center">Mobile No</td>
      <td height="40" align="center">&nbsp;</td>
      <td height="40" align="center"><input type="text" name="mobile" id="mobile" /></td>
    </tr>
    <tr>
      <td height="40" align="center">Email Id</td>
      <td height="40" align="center">&nbsp;</td>
      <td height="40" align="center"><input type="text" name="emailid" id="emailid" /></td>
    </tr>
    <tr>
      <td height="40" align="center">Hobbies</td>
      <td height="40" align="center">&nbsp;</td>
      <td height="40" align="center"><input name="chk[]" type="checkbox" id="chk[]" value="Cricket" />
        Cricket 
        <input name="chk[]" type="checkbox" id="chk[]" value="Football" /> 
        Football 
        <input name="chk[]" type="checkbox" id="chk[]" value="Music" /> 
        Music</td>
    </tr>
    <tr>
      <td height="40" align="center">Password</td>
      <td height="40" align="center">&nbsp;</td>
      <td height="40" align="center"><input type="text" name="password" id="password" /></td>
    </tr>
    <tr>
      <td height="40" align="center">DOB</td>
      <td height="40" align="center">&nbsp;</td>
      <td height="40" align="center">
      <input type="date" name="dob" />
      <!--<select name="day" id="day">
        <option>Select Date</option>
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
      </select>
        <select name="month" id="month">
          <option>Select Month</option>
          <option value="Jan">Jan</option>
          <option value="Feb">Feb</option>
          <option value="Mar">Mar</option>
        </select>
        <select name="year" id="year">
          <option>Year</option>
          <option value="1995">1995</option>
          <option value="1996">1996</option>
          <option value="1997">1997</option>
      </select>--></td>
    </tr>
    <tr>
      <td height="40" align="center">Address</td>
      <td height="40" align="center">&nbsp;</td>
      <td height="40" align="center"><textarea name="address" id="address" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td height="40" align="center">Gender</td>
      <td height="40" align="center">&nbsp;</td>
      <td height="40" align="center"><input type="radio" name="gender" id="radio" value="male" />
        Male 
          <input type="radio" name="gender" id="radio2" value="female" />
Fe Male </td>
    </tr>
    <tr>
      <td height="40" align="center">Upload Image</td>
      <td height="40" align="center">&nbsp;</td>
      <td height="40" align="center"><input type="file" name="userfile" id="userfile" /></td>
    </tr>
    <tr>
      <td height="40" align="center">Select State</td>
      <td height="40" align="center">&nbsp;</td>
      <td height="40" align="center"><select name="state" id="state">
        <option>Select State</option>
        <option value="UP">UP</option>
        <option value="Bihar">Bihar</option>
        <option value="MP">MP</option>
      </select></td>
    </tr>
    <tr>
      <td height="40" align="center">&nbsp;</td>
      <td height="40" align="center">&nbsp;</td>
      <td height="40" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td height="40" colspan="3" align="center"><input type="submit" name="button" id="button" value="Register User" /></td>
    </tr>
    <tr>
      <td height="40" align="center">&nbsp;</td>
      <td height="40" align="center">&nbsp;</td>
      <td height="40" align="center">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>