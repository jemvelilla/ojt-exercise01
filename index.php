<html>
<?php session_start(); ?>
<title>Welcome Page</title>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar"
	data-offset="50">
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
					<li><a data-target="#id01"
						onclick="document.getElementById('id01').style.display = 'block'"
						style="width: auto;">LOGIN</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="leftdiv">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
			<li data-target="#myCarousel" data-slide-to="4"></li>
			<li data-target="#myCarousel" data-slide-to="5"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="images/users home.jpg" alt="Slide 1">
				<div class="carousel-caption">
					<h3>Connect</h3>
				</div>
			</div>


			<div class="item">
				<img src="images/images01.jpeg" alt="Slide 2">
				<div class="carousel-caption">
					<h3>Interact</h3>
				</div>
			</div>

			<div class="item">
				<img src="images/images02.jpeg" alt="Slide 3">
				<div class="carousel-caption">
					<h3>Discover</h3>
				</div>
			</div>

			<div class="item">
				<img src="images/images03.jpeg" alt="Slide 4">
				<div class="carousel-caption">
					<h3>Socialize</h3>
				</div>
			</div>

			<div class="item">
				<img src="images/images04.jpeg" alt="Slide 5">
				<div class="carousel-caption">
					<h3>Have Fun</h3>
				</div>
			</div>

		</div>
		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button"
			data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"
			aria-hidden="true"></span> <span class="sr-only">Previous</span>
		</a> <a class="right carousel-control" href="#myCarousel"
			role="button" data-slide="next"> <span
			class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	
	</div>
	<div class="rightdiv">
		<div class="rightdiv-inner">
			<h1>Create a New User Account</h1>
			<p class="join"> Join us for free! </p>
			
			<form action="UserControl.php" method="post">
			
			<div class="container1">
				<table cellpadding="1" cellspacing="1">
					<tr>
						<td><input class="w3-input w3-border w3-round-xxlarge" type="text"
							name="firstname" placeholder='Firstname' maxlength="50" size="15" required></td>
						<td>&nbsp;</td>
						<td><input class="w3-input w3-border w3-round-xxlarge" type="text"
							name="lastname" placeholder='Lastname' maxlength="50" size="15" required></td>
					</tr>
				</table>
				<br>
				<table cellpadding="1" cellspacing="1">
					<tr>
						<td><input class="w3-input w3-border w3-round-xxlarge"
							type="text" name="username" placeholder='Username' size="40" minlength="3" maxlength="12" required></td>
					</tr>
				</table>
				<br>
				<table cellpadding="1" cellspacing="1">
					<tr>
						<td><input class="w3-input w3-border w3-round-xxlarge"
							type="password" name="password" placeholder='New Password' size="40" required></td>
					</tr>
				</table>
				<br>
				<table cellpadding="1" cellspacing="1">
					<tr>
						<td><input class="w3-input w3-border w3-round-xxlarge"
							type="email" name="email" placeholder='Email Address' size="40" required></td>
					</tr>
				</table>
				<br>
				<table cellpadding="1" cellspacing="1">
					<tr>BIRTHDAY</tr>
					<tr>
						<td><input class="w3-input w3-border w3-round-xxlarge" type="date" name="birthday" required></input></td>
					</tr>
					<br>
					<table cellpadding="1" cellspacing="1">
					<tr>
						<td><input class="w3-radio" type="radio" name="gender" value="male" required> Male
						</td>
						<td>&nbsp;</td>	
						<td>	
							<input class="w3-radio" type="radio" name="gender" value="female" required> Female
						</td>
					</tr>
				</table>
				<br>
				<center>
					<button class='w3-button w3-green w3-round-xxlarge' type="submit"
						name="create" value='Create'>&nbsp;CREATE&nbsp;</button>
				</center>
			</div>
		</form>
		</div>
		
	</div>
	<div id="id01" class="modal">

		<form action="UserControl.php" method="post" class="modal-content animate">
			<div class="imgcontainer">
				<span
					onclick="document.getElementById('id01').style.display = 'none'"
					class="close" title="Close Modal">&times;</span>

			</div>
			<div class="container1">


				<table cellpadding="1" cellspacing="1" align="center">
					<tr>
						<p align='center'>USERNAME</p>
						<td><input class="w3-input w3-border w3-round-xxlarge" type="text"
							name="username" placeholder='username' required></td>
					</tr>
				</table>
				<br>

				<table cellpadding="1" cellspacing="1" align="center">
					<tr>
						<p align='center'>PASSWORD</p>
						<td><input class="w3-input w3-border w3-round-xxlarge"
							type="password" name="password" placeholder='password' required></td>
					</tr>
				</table>
				<br>
				<center>
					<button class='w3-button w3-green w3-round-xxlarge' type="submit"
						name="login" value='Login'>&nbsp;LOG IN&nbsp;</button>
				</center>
			</div>
		</form>
	</div>

	<script>
            // Get the modal
            var modal = document.getElementById('LOGIN');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
           
   	</script>

</body>
    	
</html>
