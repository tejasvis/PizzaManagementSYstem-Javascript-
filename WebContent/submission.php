<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="ui-bootstrap-tpls-0.14.3.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirmation Page</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<script>


var taxamount = parseFloat(localStorage.getItem("Total")) + (parseFloat(localStorage.getItem("Total")) * 0.1);

function retreiveJS()
{
	var x = parseFloat(localStorage.getItem("Total"));
	var y = parseFloat(x*0.1);
	document.getElementById("tot").innerHTML = " <address><strong> <center>$" + x.toFixed(2) + "</address></strong> </center>" ;
	document.getElementById("tax").innerHTML = "<address><strong> <center> $" +y.toFixed(2) + "</address></strong> </center>";
}

function updateTotal(){
var carryout = document.getElementById('Carryout').checked;	
var flag=false;
if(carryout == true){
		document.getElementById("deliverytype").innerHTML = " <address><strong> <center>$ 0.00 </address></strong> </center>"  ;
		document.getElementById("deliveryhome").style.display = "none";
		document.getElementById("CarryoutAddr").style.display = "inline";
	}
	else  {
		flag=true;
		document.getElementById("deliverytype").innerHTML = " <address><strong> <center>$ 3.50 </address></strong> </center>"  ;
		document.getElementById("deliveryhome").style.display ="inline";
		document.getElementById("CarryoutAddr").style.display = "none";
	}
	
	if(flag){
		var tax = parseFloat(taxamount) + 3.50;
		document.getElementById("overallTotal").innerHTML = " <address><strong> <center>$" + tax.toFixed(2) + "</address></strong> </center>";
	}
	else
		document.getElementById("overallTotal").innerHTML = " <address><strong> <center>$" + taxamount.toFixed(2) + "</address></strong> </center>" ;
}

function cardValidation(){
	
  var visaRegEx = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
  var mastercardRegEx = /^(?:5[1-5][0-9]{14})$/;
  var amexpRegEx = /^(?:3[47][0-9]{13})$/;
  var discovRegEx = /^(?:6(?:011|5[0-9][0-9])[0-9]{12})$/;
  var isValid = false;
  var ccNum=document.getElementById("cardNumber").value;
		if (visaRegEx.test(ccNum)) {
			isValid = true;
		} else if(mastercardRegEx.test(ccNum)) {
			isValid = true;
		} else if(amexpRegEx.test(ccNum)) {
			isValid = true;
		} else if(discovRegEx.test(ccNum)) {
			isValid = true;
		}
		if(!isValid) {     
			alert('Please enter the valid card details!');
			return false;
		}
		var validZip=document.getElementById("cardZip").value;
			if(! (validZip.match(/(^\d{5}$)|(^\d{5}-\d{4}$)/)) ){
				alert('Please enter valid zip code!');
				return false;
			}

		var validCVV=document.getElementById("cardCvv").value;
			if( !(validCVV.match(/?([0-9]{3}|[0-9]{4})$/)) )
			{
				alert('Please enter valid card cvv!');
				return false;
			}

  		var expire = document.getElementById("cardYear").value; 	
			if(!(expire.match(/^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/)) )
				{
					alert('The expire date format is not correct!Please enter valid one\n');
					return false;
				} 
				else {					
				// get current year and month
				var d = new Date();				
				var currentYear = d.getFullYear();
				var currentMonth = d.getMonth() + 1;
				console.log(currentMonth);
				// get parts of the expiration date
				var parts = expire.split('/');
				var year = parseInt(parts[1], 10) + 2000;
				var month = parseInt(parts[0], 10);
				console.log(month);
				// compare the dates
					if (year < currentYear || (year == currentYear && month < currentMonth)) {
						alert('The expiry date has passed.Please enter correctly.\n');
						return false;
					}
				}
	}
</script>
<body onload="javascript:retreiveJS()">
<section id="banner">
      <div class="bg-color">	  
		<div class="container">		
        <div class="row">		
          <div class="inner text-center">
			  <form action="login.php">
			<input type="submit" class="btn btn-imfo btn-read-more" value="Login" style="vertical-align:top; float: right" >	
			</form>
            <h1 class="logo-name">Tejasvi's Pizza Shop</h1>
            <!-- <h2>Plan your dinner smartly.</h2> -->
          </div>
        </div>
      </div>
		
<div class = "container">
	<div class="col-md-12  details-text" style="padding-bottom:100px;">
		<div class="content-holder">
				<br/> <br/>
			<div class = "tab-content"> 	
				<div id = "waitingList" class="tab-pane fade in active" >
						<br/> <br/>
					<h2> Select your order type:</h2> 
						<form action ="submission.php">
							<label class="radio-inline">
								<input type="radio" value = "Carryout" onchange="updateTotal()" name="Order Type" id="Carryout"> <address>
								<strong>  Carry Out  </address> </strong>
								<input type="radio" value = "Delivery" onchange="updateTotal()" name="Order Type" id="Delivery"> <address>
								<strong> Delivery  </address> </strong>
							</label>
						</form>    
					<!-- menu -->
				<section id="menu-list" class="section-padding" >
					<div class="container">
							<h2>Order Type</h2>
						<div class="mix category-2 menu-restaurant" id="deliveryhome" style="display: none; ">
							<h2>Please enter your Address</h2>
							<fieldset>	
								
								<label class="cardLabel cf">Address:</label>
								<input type="text" placeholder="Enter Street Name" size="20"></input><br>
								
								<label class="cardLabel cf">Apartment: </label>
								<input type="text" placeholder="Enter Apartment"></input><br>
								
								<label class="cardLabel cf">City: </label>
								<input type="text" placeholder="Enter the City"></input><br>

								<label class="cardLabel cf">State: </label>
								<input type="text" placeholder="Enter the State"></input><br>
								
								<label class="cardLabel cf">Zip code:</label>
								<input type="text" placeholder="Enter Zip Code"></input>
								
							</fieldset>
						</div>							
							<div class="mix category-2 menu-restaurant" id="CarryoutAddr" style="display: none; " >
							<h2>Carry out Address</h2>
							<address><strong>Tejasvi's Pizza Shop, <br>108 Lucinda Ave,<br>Normal Rd,<br> IL 60115</strong></address>
							</div>	
					</div>
								
				</section>
		
		<h2> <center>Total Amount </center> </h2>
							
							<table  id="myOrderTable" class="table table-condensed" border="1" width="40%">
							<thead>
							<tr>
							<th> <address> <strong> <center>Your Order: </center>  </strong></address>  </th>
							<th id="tot"> <h2> <center>  <center> </h2> </th>
							</tr>
							</thead>
							<tr >
							<td> <address><strong> <center>Delivery:</center> </strong> </address> </td>		
							<td id = "deliverytype"> <address>
							<strong><center>  </center> </strong> </address> </td>
							</tr>
							<tr >
							<td> <address>
							<strong> <center>Tax (10%):</center> </strong> </address> </td>		
							<td id="tax"> <address>
							<strong><center>  </center> </strong> </address> </td>
							</tr>
							<tr ><td><address><strong> <center>Total:</center></strong></address></td>		
							
						
							<td id="overallTotal"> <address>
							<strong><center>  </center> </strong> </address> </td>
							</tr>
							</table>
		
		
					<form action="" method="POST" onsubmit="return cardValidation();">
							<section id="menu-list" class="section-padding" >
								<div class="container">
									<h2>Card Details</h2>	
									<fieldset>							
										<label class="cardLabel cf">Name on card:</label>
										<input type="text" placeholder="Enter Name on the card" id="cardName" required></input><br>
										
										<label class="cardLabel cf">Card Number:</label>
										<input type="text" name="Enter card Number" placeholder="Enter Valid cardNumber" id="cardNumber" required></input><br>
										
										<label class="cardLabel cf">Expiry Date: </label>
										<input type="text" placeholder="MM/YY" id="cardYear" required></input><br>
										
										<label class="cardLabel cf">Security Code:</label>
										<input type="text" placeholder="Enter cvv" id="cardCvv" required></input><br>
										
										<label class="cardLabel cf">Zip/Postal code:</label>
										<input type="text" placeholder="Enter Zip/Postal code" id="cardZip" required></input><br>
									<fieldset>				
								</div>
											
							</section>
						<center> <input type='submit' id="submitBtn" class="btn btn-imfo btn-read-more"  value = 'Confirm Order' name="orderPlace"></center>
					</form>
				</div>
			</div>	
		</div>
	</div>	
</div>
</div>
	
	
	<!-- footer -->
    <footer class="footer text-center">
        <div class="footer-top">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div class="widget">
                        <h4 class="widget-title">Tejasvi's Pizza Shop</h4>
                        <address>Created by Tejasvi Srigiriraju</address>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- / footer -->	

</body>
</html>
 <?php
	include ('db.php');
	

       date_default_timezone_set("America/Los_Angeles");
	   $submittedDate=date("Y-m-d H:i:s");	   
	   $cookingTime=date("Y-m-d H:i:s",strtotime('+20 minutes'));   
	   $deliveryTime=date("Y-m-d H:i:s",strtotime('+45 minutes'));   
       $submission=false;
       $value="";
		$connection = new mysqli ($host,$username,$password,$dbname) or die("unable to connect") ;
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
			
       if(isset($_POST['orderPlace'])){
           $query='INSERT INTO orderDetails(OrderStatus,SubmittedDatetime,CookedTime,DeliveredTime) 
           values("Submitted","'.$submittedDate.'","'.$cookingTime.'","'.$deliveryTime.'");';
           $res=$connection->query($query); 
           $submission=true;
       
		if($submission)
		{
		echo "<script type='text/javascript'>alert('Your Order submitted successfully!')</script>";
		echo "<script>window.location.assign('index.html')</script>";
			
	
		}
	   else
	   {
		echo "<script type='text/javascript' class='errormessage'>alert('failed to place your order.Please try again..')</script>";
	   }
	}?>