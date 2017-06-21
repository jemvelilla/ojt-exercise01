<html>
    <head>
        <title>Users</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <!--<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/global.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
						<li><a href="index.php">LOGOUT</a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<!-- Page content -->
        <div class="w3-content w3-padding" style="max-width:1564px">


            <div class="w3-container w3-padding-32">
                <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">HELLO!</h3>
                <p>Add New User</p>
                <form action="UserControl.php" method="post" style = "display:inline">
                    
                    <input class="w3-input w3-section" type="text" placeholder="Username" value="" name="username" minlength="3" maxlength="12" required>
                    <input class="w3-input w3-section" type="password" placeholder="Password" value="" name="password" required>
                    <input class="w3-input w3-section" type="email" placeholder="Email" value="" name="email" required>
                    <input class="w3-input w3-section" type="text" placeholder="First Name" value="" name="firstname" maxlength="50" required>
                    <input class="w3-input w3-section" type="text" placeholder="Last Name" value="" name="lastname" maxlength="50" required>
                    <input class="w3-input w3-section" type="date" placeholder="Birthdate" value="" name="birthday" required>
                    <input class="w3-radio" type="radio" name="gender" value="male" required> Male
                    <input class="w3-radio" type="radio" name="gender" value="female" required> Female
                    <br><br>
                
                    <button class="w3-button w3-green w3-round-xxlarge" type="submit" value="AddUser" name="addUser">
                        <i class="fa fa-pencil"></i> ADD & SAVE
                    </button>
          			<button class="w3-button w3-green w3-round-xxlarge" type="submit" value="AddAnother" name="addAnother">
                        <i class="fa fa-pencil"></i> ADD ANOTHER
                    </button>
                	
                </form>
                <a href="viewUsers.php">
                    <button class="w3-button w3-green w3-round-xxlarge" type="submit" value="Cancel" name="cancel">
                        <i class="fa fa-trash-o"></i> CANCEL
                    </button>
    				</a>
            </div>

            <!-- End page content -->
        </div>
    </body>
</html>
