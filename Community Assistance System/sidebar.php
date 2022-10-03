<?php 
include_once('config.php');
?>


<div class="card">
<div class="img">
  <a href="user_directory.php">User Directory</a>
  </div>
</div>

<!--Urgent Requests-->
<div class="card">
      <h2>Urgent Requests</h2>
      <table>
      <tbody><tr>
      
	  		               
<?php
 // Check connection
 if (mysqli_connect_errno())
 {
     echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
 }
 else
 {
 //SQL Querry to Database
 $sql = "SELECT * from requests JOIN customers ON customers.id = requests.userid WHERE `status` LIKE 'Urgent' && date >= CURRENT_DATE() && claimed='No' ORDER BY date LIMIT 3;";

 if(!$result = $conn->query($sql)){
     echo "<p>There was an error running the query [" . mysqli_error($conn) . "]</p>";
 }  
 else {

     while($row = $result->fetch_assoc()){
      $userid = $row["id"];
      $fname = $row["fname"];
      $lname = $row["lname"];
      $date = $row["date"];
      $service = $row["service"];
      $title = $row["title"];
      $description = $row["description"]; 

      echo "<div class=\"img\">
      <b><a href=\"user.php?u=$userid\" style=\"color: lightblue; text-decoration: none;\">$fname $lname</a></b><br>
      <strong>$date</strong> <br>$service <br>$title<br>$description</div>";
     }
     }
     }

    // if error occurs 
    if ($conn -> connect_errno)
    {
       echo "Failed to connect to MySQL: " . $conn -> connect_error;
       exit();
    }

		if (!$result->num_rows > 0) 
		{
      $urMessage = "<p> No Urgent Requests</p>";  
    }
    ?>
    <div class="img">
    <?php echo $urMessage ?>
    </div></tr>
  </tbody>
  </table>
		
    <div class="img"><a href="volunteer.php?c=%">View All Requests</a></div>
    </div>


		    <!--Volunteer Work-->
        <div class="card">
      <h2>My Volunteer Work</h2>
      <table>
      <tr>
	  
<?php	
/*   volunteer work */
// Check connection
if (mysqli_connect_errno())
{
    echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
}
else
{
//SQL Querry to Database
$sql2 = "SELECT *, volunteers_requests.userid AS 'volunteerID', customers.id AS 'requestorID'
FROM volunteers_requests
JOIN requests ON requests.request_id = volunteers_requests.requestid
JOIN customers ON requests.userid = customers.id";

if(!$result = $conn->query($sql2)){
    echo "<p>There was an error running the query [" . mysqli_error($conn) . "]</p>";
}  
else {

    while($row = $result->fetch_assoc()){
     $voluserid = $row["id"];
     $volfname = $row["fname"];
     $vollname = $row["lname"];
     $voldate = $row["date"];
     $volservice = $row["service"];
     $voltitle = $row["title"];
     $voldescription = $row["description"]; 

     echo "<div class=\"img\">
                <b><a href=\"user.php?u=$voluserid\" style=\"color: lightblue; text-decoration: none;\">$volfname $vollname</a></b><br>
                <strong>$voldate</strong> <br>$volservice<br>$voltitle<br>  $voldescription
	        </div>";
    }
    }
    }

   // if error occurs 
   if ($conn -> connect_errno)
   {
      echo "Failed to connect to MySQL: " . $conn -> connect_error;
      exit();
   }
?> 

      <div class="img"><a href="my_profile.php">View My User Profile</a></div>
    </div>

    <!--Connect-->
    <div class="card">
      <h2>Connect</h2>
      <div style="display: flex; justify-content: center;">
      <a href="javascript:void(0)"><img src="Images\facebookicon.png" id="facebookIcon" onmouseover="facebook_onHover()" onmouseout="facebook_offHover()"></a>
      <a href="javascript:void(0)"><img src="Images\instaicon.png" id="instaIcon" onmouseover="instagram_onHover()" onmouseout="instagram_offHover()"></a>
      <a href="javascript:void(0)"><img src="Images\twittericon.png" id="twitterIcon"  onmouseover="twitter_onHover()" onmouseout="twitter_offHover()"></a>
      <div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="Scripts\imageswap.js"></script>