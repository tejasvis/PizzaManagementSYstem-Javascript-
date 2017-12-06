<html>
<head>
    
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tejasvi's Pizza Shop</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    </head>
    <body>   <!--banner-->
    <section id="banner">
      <div class="bg-color">
        <div class="container">
            <form action="index.html">
			<input type="submit" class="btn btn-imfo btn-read-more" value="Logout" style="vertical-align:top; float: right">	
            
			</form>
        <div class="row">
          <div class="inner text-center">
            <h1 class="logo-name">Tejasvi's Pizza Shop</h1>
            <!-- <h2>Pizza Right Away.</h2> -->
            <p>Pizza Right Away!!</p>
          </div>
        </div>
        </div>
      </div>
    </section>


<!--- Submitted Order -->
  <section id="about" class="section-padding">
    <div class="content-holder">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center marb-35">

                    
                    <label> <h1 class="header-h" > All Submitted Orders</h1></label><br/>
                     
       <?php
       
       include ('db.php');
       $connection = new mysqli ($host,$username,$password,$dbname) or die("unable to connect") ;
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

       $query= "select * from orderDetails where orderStatus='Submitted';";
       $res=$connection->query($query);
       if(!$res){
           die('Invalid query: ' . mysql_error());
       }
       $rowCount=mysqli_num_rows($res);
       
       if($rowCount>0){
           echo "<table class='table table-hover' border=1 style=width:50%,height=50% align='center'>";
           echo "<th> Order Id </th>";
           echo "<th> Status</th>";
           echo "<th> Ordered Time</th>";
           echo "<th> Change Status</th>";
           while($cRow=mysqli_fetch_array($res)){
                            echo "<tr>";
               echo "<td>".$cRow["0"]."</td>";
               echo "<td>".$cRow["1"]."</td>";
               echo "<td>".$cRow["2"]."</td>";
               
               echo "<td> 
                <form method='POST' action='RetrieveOrder.php'>
                    <input type='hidden' value='".$cRow['OrderId']."' name='row-id'>
               <input type='submit' name='changeTocook' value='Change to Cooked/Pending'  class='cb_table-hover tbody tr' >  </td>
               </form>
               "; 
               echo "</tr>";
              
               if(isset($_POST['changeTocook'])){
                   if (isset($_POST['row-id'])) {
                   $rowToDelete = intval($_POST['row-id']);
                $queryTocook="update orderDetails set orderStatus='Pending' where orderId=".$rowToDelete." LIMIT 1;";
               $resAfterCook=$connection->query($queryTocook);
               echo '<script> location.replace("RetrieveOrder.php"); </script>';
                   }  
          }
               
           }
           
           echo "</table>";
           
       }
            
       ?>
         </div>
            </div>
         </div>
     </div>
    </section> 

    <!-- All Pending or cooked order-->
    <section id="about" class="section-padding">
    <div class="content-holder">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center marb-35">

                    
                    <label> <h1 class="header-h" > All Pending/Cooked Orders</h1></label><br/>
                     
       <?php
       
       include ('db.php');
      $connection = new mysqli ($host,$username,$password,$dbname) or die("unable to connect") ;
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

       $query= "select * from orderDetails where orderStatus='Pending';";
       $res=$connection->query($query);
       if(!$res){
           die('Invalid query: ' . mysql_error());
       }
       $rowCount=mysqli_num_rows($res);
       
       if($rowCount>0){
           echo "<table class='table table-hover' border=1 style=width:50%,height=50% align='center'>";
           echo "<th> Order Id </th>";
           echo "<th> Status</th>";
           echo "<th> Ordered Time</th>";
           echo "<th> Change Status</th>";
           while($cRow=mysqli_fetch_array($res)){
                            echo "<tr>";
               echo "<td>".$cRow["0"]."</td>";
               echo "<td>".$cRow["1"]."</td>";
               echo "<td>".$cRow["2"]."</td>";
               
               echo "<td> 
                <form method='POST' action='RetrieveOrder.php'>
                    <input type='hidden' value='".$cRow['OrderId']."' name='row-id'>
               <input type='submit' name='changeTodeliver' value='Change to Delivered'  class='cb_table-hover tbody tr' >  </td>
               </form>
               "; 
               echo "</tr>";
              
               if(isset($_POST['changeTodeliver'])){
                   if (isset($_POST['row-id'])) {
                   $rowToDelete = intval($_POST['row-id']);
                $queryToDeliver="update orderDetails set orderStatus='Delivered' where orderId=".$rowToDelete." LIMIT 1;";
               $resAfterDeliver=$connection->query($queryToDeliver);
               echo '<script> location.replace("RetrieveOrder.php"); </script>';
                   }  
          }
               
           }
           
           echo "</table>";
           
       }
            
       ?>
         </div>
            </div>
         </div>
     </div>
    </section> 


    <!-- All Delivered order-->
    <section id="about" class="section-padding">
    <div class="content-holder">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center marb-35">

                    
                    <label> <h1 class="header-h" > All Delivered Orders</h1></label><br/>
                     
       <?php       
       
       $connection = new mysqli ($host,$username,$password,$dbname) or die("unable to connect") ;
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

       $query= "select * from orderDetails where orderStatus='Delivered';";
       $res=$connection->query($query);
       if(!$res){
           die('Invalid query: ' . mysql_error());
       }
       $rowCount=mysqli_num_rows($res);
       
       if($rowCount>0){
           echo "<table class='table table-hover' border=1 style=width:50%,height=50% align='center'>";
           echo "<th> Order Id </th>";
           echo "<th> Status</th>";
           echo "<th> Ordered Time</th>";
           echo "<th> Delivered Time</th>";
           while($cRow=mysqli_fetch_array($res)){
               echo "<tr>";
               echo "<td>".$cRow["0"]."</td>";
               echo "<td>".$cRow["1"]."</td>";
               echo "<td>".$cRow["2"]."</td>";
               echo "<td>".$cRow["3"]."</td>";
               echo "</tr>";
               
           }
           echo "</table>";
            
       }
            
       ?>
         </div>
            </div>
         </div>
     </div>
    </section> 
       
       
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
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mixitup.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>


     
    
        </body>


    </html>
