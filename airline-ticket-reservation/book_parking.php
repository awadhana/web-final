<?php
	session_start();
?>
<html>
	<head>
		<title>
			View Available Parking
		</title>
			<link rel="stylesheet" type="text/css" href="main.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
		<style>
		*{
				text-align:center;
		}
		html{
		background: url(slide5.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
		}
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
			table,tr,td{
				margin:auto;
			}
		</style>
	</head>
	<body>
		<div>
			<ul>
				<li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="customer_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="home_page.php"><i class="fa fa-address-book" aria-hidden="true"></i> About Us</a></li>
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
    						?>
							<table cellpadding="5">
				<tr>
					<td class="fix_table">Enter the No. of Days</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="number" name="no_of_days" placeholder="Eg. 2" required></td>
				</tr>
			</table>
 							<?php

    						echo "<input type=\"submit\" value=\"Select Spot\" name=\"Select\">";
    						echo "</form>";
    					//}
					//mysqli_stmt_close($stmt);
					mysqli_close($dbc);
		?>
	</body>
</html>