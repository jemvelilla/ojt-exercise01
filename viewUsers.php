<html>
    <head>
        <title>Users</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <!--<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/global.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/sorttable.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.0.0.min.js"></script>
        <style>
            .nav-tabs li a {
                color: #777;
            }
            .navbar {
                font-family: Montserrat, sans-serif;
                margin-bottom: 0;
                background-color: #2d2d30;
                border: 0;
                font-size: 11px !important;
                letter-spacing: 4px;
                opacity: 0.9;
            }
            .navbar li a, .navbar .navbar-brand { 
                color: #d5d5d5 !important;
            }
            .navbar-nav li a:hover {
                color: #fff !important;
            }
            .navbar-nav li.active a {
                color: #fff !important;
                background-color: #29292c !important;
            }
            .navbar-default .navbar-toggle {
                border-color: transparent;
            }
            .sortButton {

            background-color: Transparent;
            background-repeat:no-repeat;
            border: none;
            cursor:pointer;
            overflow: hidden;

            }
        </style>
    </head>
    <body>
 
       <nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#myNavbar">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand">Users.Com</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="homepage.php">LOGOUT</a></li>
				</ul>
			</div>
		</div>
		</nav>

        <!-- Page content -->
   	 	<br><br>
   	 	<div class="w3-content w3-padding" style="max-width:1564px">

            <form action="UserControl.php" method="post">
                    
            <div class="w3-container w3-padding-32">
            
                  <table class="w3-table-all w3-hoverable w3-centered w3-card-4">
                    <thead>
            
                        <tr class="w3-light-grey">
                            <th></th>
                            <th>USERNAME</th>
                            <th>PASSWORD</th>
                            <th>EMAIL</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>BIRTHDATE</th>
                            <th>GENDER</th>
                        </tr>
                    </thead>
            		<?php 
               		 	$servername = "localhost";
               		 	$username = "root";
               		 	$password = "";
               		 	$dbname = "exercise1";
               		 	$conn = new PDO ( "mysql:host=$servername;dbname=$dbname", $username, $password );
               		 	// set the PDO error mode to exception
               		 	$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
               		 	$sql = "SELECT * FROM records";
               		 
						foreach ($conn->query($sql) as $row){
           			?>
              		     	
                        <tr>
                            <td><input type="checkbox" name="todelete" value=<?php $row['id']?>></td>
                            <td><div class="radio"><center><?php print $row['Username'] ?></center></div></td>
                            <td><div class="radio"><center><?php print $row['Password'] ?></center></div></td>
                            <td><div class="radio"><center><?php print $row['Email']?> </center></div></td>
                            <td><div class="radio"><center><?php print $row['First Name']?></center></div></td>
                            <td><div class="radio"><center><?php print $row['Last Name']?></center></div></td>
                            <td><div class="radio"><center><?php print $row['Birthdate']?></center></div></td>
                            <td><div class="radio"><center><?php print $row['Gender']?></center></div></td>
                        </tr>
                	<?php 
                	}
                	?>
                </table>
                
             
                <div class="w3-row-padding w3-padding-32 w3-center" style="margin:0 -16px">
                    <a href="addUsers.php">
                    <button class="w3-button w3-green w3-round-xxlarge" type="submit" value="Update" name="update">
                        <i class="fa fa-pencil"></i> ADD</a>
                    </button>
                    
                    <a href="updateUsers.php">
                    <button class="w3-button w3-green w3-round-xxlarge" type="submit" value="Update" name="update">
                        <i class="fa fa-pencil"></i> UPDATE</a>
                    </button>
                    
                    <button class="w3-button w3-green w3-round-xxlarge" type="submit" value="Delete" name="delete">
                        <i class="fa fa-trash-o"></i> DELETE
                    </button>
                </div>
                
            </div>
            </form>
            <!-- End page content -->
        </div>

        <script>
            function myFunction() {
                alert("Deleted");
            }
        </script>
    </body>
</html>


