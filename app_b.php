<?php require_once("header.php"); ?>


	<?php
	//require another php file
	//../../ means go to folders back
	require_once("../../config.php");
	
	
	//******************************
	//******** SAVE TO DB **********
	//******************************
		
		
		//connection with username and password
		//access username from config
		//echo $db_username;
		
		//1 server name
		//2 username
		//3 password
		//4 database
		
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_mertyarba");
		
		$stmt = $mysql->prepare("INSERT INTO homework(location, time, punishment, name)VALUES (?, ?, ?, ?)");
		
		//We are replacing question marks with values
		//s - string, date or smth that is based on characters and numbers
		//i - integer, number
		//d - decimal, float
		
		//for each question mark its type with one letter
		$stmt->bind_param("ssss", $_GET["location"], $_GET["time"], $_GET["punishment"], $_GET["name"]);
		
		//echo error
		echo $mysql->error;
		
		//save
		if ($stmt->execute()){
			echo "saved successfully";
		}else{
			echo $stmt->error;
		}
	
	//*****************
	//TO validation
	//*****************
	if (isset($_GET["location"])){//if there is "?location=" in the message
		if (empty($_GET["location"])){//if it is empty
		echo "Define location! <br>";//yes it is empty
		}else{
			echo "Location: ".$_GET["location"]."<br>";//no it is not empty
		}
	}
	
	//check if there is variable in the URL
	if (isset ($_GET["time"])){
		
		//only if there is message in the URL
		//echo "there is message";
		
		// if it is empty
		if (empty ($_GET["time"])){
			//it is empty
			echo "What time are you meeting? <br>";
		}else{
			//It is not empty
			echo "Time: ".$_GET["time"]."<br>";
		}
	}else{
		
	}
	
	
	
	if (isset($_GET["punishment"])){//if there is "?punishment=" in the message
		if (empty($_GET["punishment"])){//if it is empty
		echo "What's the punishment? <br>";//yes it is empty
		}else{
			echo "Punishment: ".$_GET["punishment"]."<br>";//no it is not empty
		}
	}
	
	if (isset($_GET["name"])){//if there is "?name=" in the message
		if (empty($_GET["name"])){//if it is empty
		echo "What's your name? <br>";//yes it is empty
		}else{
			echo "Name: ".$_GET["name"]."<br>";//no it is not empty
		}
	}
	
	
	//Getting the message from the address
	//if there is $name= .. then $_GET ["name"]
	//$my_message = $_GET ["message"];
	//$to = $_GET ["to"];
	//$urgency = $_GET ["urgency"];
	//echo "My message is " .$my_message. " and it is to " .$to;
	
	


?>


	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">Let's Play A Game</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
		  <ul class="nav navbar-nav">
			
			<li class="active">
				<a href="app_b.php">
					Game
				</a>
			</li>
			
			
			<li>
				<a href="table_b.php">
					Time Table
				</a>
			</li>
			
		  </ul> 
		  
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">

		<h1> DON'T BE LATE </h1>
		
	<form>
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="form-group">
					<label for="name">Name: </label>
					<input name="name" id="to" type="text" class="form-control">
				</div>
			</div>
		</div>
		
		<div class="row">
		<div class="col-md-3 col-sm-6">
				<div class="form-group">
					<label for="location">Location: </label>
					<input name="location" id="message" type="text" class="form-control">
				</div>
			</div>
		
		</div>
		
		<div class="row">
		<div class="col-md-3 col-sm-6">
				<div class="form-group">
					<label for="time">Time: </label>
					<input name="time" id="message" type="text" class="form-control">
				</div>
			</div>
		
		</div>
		
		<div class="row">
		<div class="col-md-3 col-sm-6">
				<div class="form-group">
					<label for="punishment">Punishment: </label>
					<input name="punishment" id="message" type="text" class="form-control">
				</div>
			</div>
		
		</div>
		
		<div class="row">
			<div class="col-md-3 col-sm-6">
			<input class="btn btn-success hidden-xs btn-md-3" type="submit" value="Let the game begin!">
			<input class="btn btn-success visible-xs-inline btn-block" type="submit" value="Let the game begin!!!">
		</div>
		
		

  
	</div>
  
  </body>
</html>
