<?php
	session_start();
?>
<html>
	<head>
		<title>
			View Available Parking
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 390px
			}
			table {
			 border-collapse: collapse; 
			}
			tr/*:nth-child(3)*/ {
			 border: solid thin;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	</head>
	<body>
		<img class="logo" src="images/shutterstock_22.jpg"/> 
		<h1 id="title">
			AADITH AIRLINES
		</h1>
		<div>
			<ul>
				<li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="customer_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="home_page.php"><i class="fa fa-plane" aria-hidden="true"></i> About Us</a></li>
				<li><a href="home_page.php"><i class="fa fa-phone" aria-hidden="true"></i> Contact Us</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<h2>AVAILABLE PARKING</h2>
		<?php

					require_once('Database Connection file/mysqli_connect.php');
					
						$query="SELECT spot_no,type,price,available FROM parking_details";
						
						$result = mysqli_query($dbc, $query);


						//if(mysqli_stmt_num_rows($stmt)==0)
						//{
							//echo "<h3>No flights are available !</h3>";
						//}
						//else
						//{
							echo "<form action=\"book_parking_payment.php\" method=\"post\">";
							echo "<table cellpadding=\"10\"";
							echo "<tr>
							<th>Spot Number</th>
							<th>Type</th>
							<th>Price</th>
							<th>Availablity</th>
							<th>Select</th>
							</tr>";
							while($row = mysqli_fetch_row($result)) {
        						echo "<tr>
        						<td>".$row[0]."</td>
        						<td>".$row[1]."</td>
								<td>".$row[2]."</td>
								<td>".$row[3]."</td>
								<td><input type=\"radio\" name=\"select_parking\" value=\"".$row[0]."\"></td>
        						</tr>";
    						}
    						echo "</table> <br>";
    						echo "<input type=\"submit\" value=\"Select Spot\" name=\"Select\">";
    						echo "</form>";
    					//}
					//mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					// else
					// {
					// 	echo "Submit Error";
					// 	echo mysqli_error();
					// }
		?>
	</body>
</html>