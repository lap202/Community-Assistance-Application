<?php 
if (isset($_GET['s']))
  {
  $searchQuery=$_GET['s'];
  }
  else
  {
    $searchQuery="%";
  }
  include_once('LoggedInToSession.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset= "utf-8" />
	<link href= "CSS/community_assistance.css" rel="stylesheet" />
	<link href= "CSS/CA_Base.css" rel="stylesheet" />
  <link href= "CSS/forms.css" rel="stylesheet" />
    <title>Community Assistance South Dakota</title>
</head>


<body>
	<div class="header">
	<?php 
include_once('header.php');
?>
	</div>
<div class="topnav">
<?php 
include_once('topnav.php');
?>
</div>

<!-----------------------Left Column(Content)---------------------------->
<div class="row">
  <div class="leftcolumn">
    <h2>User Directory</h2>
    <!--Search Function-->
    <form action="searchUsers.php" method="POST">
      <Label>Search Users</Label>
      <input type="text" id="search" name="search">
      <button type="submit">Search</button>
    </form>

    <!--Request cards generated for each request. Automatically sorts by Date.-->
    <?php
    include_once('config.php');

     //Attempt to connect to the database
     $db = mysqli_connect($servername,$username,$password,$dbname);

     // Check connection
     if (mysqli_connect_errno())
     {
         echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
     }
     else
     {
     //SQL Querry to Database
     $sql = "SELECT fname, lname, id
     FROM customers
     WHERE fname LIKE '%$searchQuery%' OR lname LIKE '%$searchQuery%'
     ORDER BY fname";

     if(!$result = $db->query($sql)){
         echo "<p>There was an error running the query [" . mysqli_error($db) . "]</p>";
     }  
     else {

         while($row = $result->fetch_assoc()){
          $name = $row['fname'] . " " . $row['lname'];
          $userid = $row["id"];

          echo "<div class=\"requestCard\">
                <b><a href=\"user.php?u=$userid\" style=\"color: #0099ff; text-decoration: none;\">$name</a></b>
                </div>";         
         }
         }
         }
    ?>
  </div>
  
<!----------------------------------------------------------------------->


<!---------------------Right Column(Info Bar)---------------------------->
  <div class="rightcolumn">
    <?php
    include_once('sidebar.php');
    ?>
    
  </div>
</div>
<!----------------------------------------------------------------------->



<div class="footer">
<?php
  include('footer.php');
  ?>
</div>

</body>
</html>
