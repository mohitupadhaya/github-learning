<?php
@session_start();
ob_start();
$con = mysql_connect("localhost","root","") or die("mysql not connected");
mysql_select_db("brijesh",$con) or die("database not connected");


function user_register()
{
	
	extract($_POST);
	
	//echo $emailid;
	
	$query_exist = "SELECT * FROM `tbl_user` WHERE `emailid` LIKE '$emailid'";
	$data_exist = mysql_query($query_exist);
	$num = mysql_num_rows($data_exist);
	if($num>=1)
	{
		echo "Mailid Already Exists";
		}
	else
	{
	$hobbies = implode(",",$chk);
	//$dob = $day."-".$month."-".$year;
	
	$userfile = $_FILES['userfile']['name'];
	$tmp_userfile = $_FILES['userfile']['tmp_name'];
	move_uploaded_file($tmp_userfile,"upload/".$userfile);
	
	$query = "INSERT INTO `tbl_user` (`id`, `fname`, `lname`, `mobile`, `emailid`, `hobbies`, `password`, `dob`, `address`, `gender`, `userfile`, `state`, `postdate`) VALUES (NULL, '$fname', '$lname', '$mobile', '$emailid', '$hobbies', '$password', '$dob', '$address', '$gender', '$userfile', '$state', NOW())";
	$data = mysql_query($query);
	
	if($data)
		{
			echo "Success";
			}
	else
	{
		echo "Try again";
		}		
	
	}
	
	
	}
	
function show_record()
{
	$query = "SELECT * FROM `tbl_user`";
	$data = mysql_query($query);
	//return $data;
	
  $i = 1;
  while($record = mysql_fetch_array($data))
  {
  ?>
  <tr bgcolor="<?php if($i%2==0) echo "red"; else echo "#cccccc";?>">
    <td height="40" align="center"><?php echo $i;?></td>
    <td height="40" align="center"><?php echo $record[0];?></td>
    <td height="40" align="center"><?php echo $record[1];?></td>
    <td height="40" align="center"><?php echo $record[2];?></td>
    <td height="40" align="center"><?php echo $record[3];?></td>
    <td height="40" align="center"><?php echo $record[4];?></td>
    <td height="40" align="center"><?php echo $record[5];?></td>
    <td height="40" align="center"><?php echo $record[6];?></td>
    <td height="40" align="center"><?php echo $record[7];?></td>
    <td height="40" align="center"><?php echo $record[8];?></td>
    <td height="40" align="center"><?php echo $record[9];?></td>
    <td height="40" align="center"><img src="upload/<?php echo $record[10];?>" width="60" height="60" /></td>
    <td height="40" align="center"><?php echo $record[11];?></td>
    <td height="40" align="center"><?php echo $record[12];?></td>
  </tr>
  
  <?php
  $i++;
  }
  
	}	

	

?>