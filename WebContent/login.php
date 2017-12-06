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
        <div class="row">
          <div class="inner text-center">
            <h1 class="logo-name">Tejasvi's Pizza Shop</h1>
            <!-- <h2>Pizza Right Away.</h2> -->
            <p>Pizza Right Away!!</p>
			<h2> Login Page</h2>
          </div>
        </div>
        </div>
      </div>
    </section>



 <section id="about" class="section-padding">
    <div class="content-holder">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center marb-35">

                    
                    <label> <h1 class="header-h" > Login as employee</h1></label><br/>
                    <label> <h2 class="header-h>"> (user id: employee, password:1234)</h2></label><br/>

                    

                    <table class='table table-hover' border=1 style=width:50%,height=50% align='center'>
                        
                    <tr> <h3 class="header-h>"> Login </h3></tr>
                   
                    <tr>
                    <td> User Name</td>
                    <td> <input type="text" placeholder="Enter username" name="username"></td>
                    </tr>

                    <tr>
                    <td> Password</td>
                    <td> <input type="text" placeholder="Enter password" name="password"> </td>
                    </tr>
                      
                        </table>
                       <form action="RetrieveOrder.php" method="POST">
                        <input type="submit" value= "Sign In" name="signInbtn">
						<?php
                   include ('db.php');
                    isset($_POST['submit']);
                    if( isset($_POST['username']) && isset($_POST['password']) ){
                         $username=$_POST['username'];
                         $pwd=$_POST['password'];
                         if($username=='employee' && $pwd=="1234"){
							 echo $username;
                              echo "<script type='text/javascript' class='sendmessage'>alert('Logged in successfully!')</script>";
                         }
                         else{
                                echo "<script type='text/javascript' class='errormessage'>alert('Failed to login.Please try again..')</script>";
                            }

                    }


                    ?>
                         </form>

                    

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
