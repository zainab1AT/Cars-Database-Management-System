<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zainab Atwa_202109347</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <?php
       include("db_con.php");
       error_reporting(0);

       $userprofile = $_SESSION['username'];

       if($userprofile == true){

       }
      else{
         header('Location: login.php');
         exit();
       }
      ?>
   
   
   <style>
   
   

*{
    margin:0; padding:0;
    box-sizing: border-box;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    outline: none; border: none;
    text-decoration: none;
    text-transform: capitalize;
    transition: .2s linear;
}

body,html{
    overflow-x: hidden;
}


html{ 
    font-size: 62%;
    scroll-behavior: smooth;
    scroll-padding-top: 6rem;
    overflow-x: hidden;
    background-color: #ffffff;
}

section{
    padding:2rem  4%;
}


.heading{
    text-align: center;
    font-size: 4rem;
    color:#232323;
    padding:1rem ;
    margin: 2rem 0;

}

.heading span{
  color: rgb(0, 0, 0);

}

/*The start of header section */

header{
    position: fixed;
    top: 0; right: 0; left: 0;
    background-image: linear-gradient(rgb(0, 117, 201),rgb(255, 255, 255));
    padding: 1rem 9%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 1000;
    box-shadow: 0 .2rem 1rem rgb(156, 155, 155);
}

header .logo{
    font-size: 3.5rem;
    color: rgb(0, 0, 0);
    font-weight: bolder;
}

header .logo  span{
    color: #ffffff;
    font-size: 2.5rem;
}

header nav a{
    font-size: 1.5rem ;
    padding: 0 1.5rem;
    color: rgb(0, 0, 0);
}

header .mainlist a:hover {
    color: rgb(255, 255, 255);
}

header .icons a{
    font-size: 2rem;
    color: #000000;
    margin-left: 1.5rem;
}

header .icons a:hover{
    color: rgb(255, 255, 255);    
}

header #chlist{
    display:none ;
}

header .fa-bars{
    font-size: 3rem;
    color: #333;
    border-radius: .4rem;
    padding: .5rem 1rem;
    cursor: pointer;
    border: .1rem solid black;
    display: none; 
    
}

header .fa-bars:hover{
    color:white;
}

header .mainlist a:active{
    color: rgb(38, 0, 255);
}

/*The end of header section*/



/*The start of home section*/

.home{
    display: flex;
    align-items: center;
    min-height: 100vh;
    background-size: cover;
    background-position: center;
}


.home .content{  
    max-width: 50%;
}

.home .content h3{
   font-size: 2.3rem;
   color: #8e8b8b;
   font-family: Georgia, 'Times New Roman', Times, serif;
}

.home .content span{
    font-size: 5.7rem;
    color:black;
    padding: 1rem 0;
    line-height: 1.5;
    font-family:Heebo, sans-serif;
    font-weight: bold;
 }

 .home .content p{
    font-size: 1.9rem;
    color: #666363;
    padding: 1rem 0;
    line-height: 1.3;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif, sans-serif;
 }


 /*The end of home section*/

 
/*the start of footer section*/

.footer{
    background-image: linear-gradient(#ffffff,rgb(0, 117, 201));

}

.footer .dont{
    font-size:1.5rem ;
    color: #ffffff;
}

 .footer .end {
    text-align: center;
    padding: 1.5rem;
    margin-top: 1.2rem;
    padding-top: 1.5rem;
    font-size: 2.2rem;
    color: #090808;
    border-top: .2rem solid #9a11b6;

 }

 .footer .end span{
    color: #4a524b;
    font-size:2.5rem 
 }
/*the end of footer section*/

/* media */

/*when screen < 1200*/

@media (max-width:1200px) {

html{

    font-size: 60%;
}

header{
    padding: 1.0rem;
}

section{
    padding: 1.5rem;
}



}



/*when screen < 956*/

@media (max-width:956px) {
header .mainlist a{
 font-size: 1.03rem;

}

}



/*when screen < 890*/

@media (max-width:890px) {

html .fa-bars{
   display: block; 
}

header .mainlist{
    position: absolute;
    top: 100%; left:0 ; right: 0;
    background: #eee;
    border-top: .1rem solid black;
    clip-path: polygon(0 0,100% 0,100% 0,0 0);
}

header #chlist:checked ~ .mainlist{
    clip-path: polygon(0 0,100% 0,100% 100%,0% 100%);
}

header .mainlist a{
    margin: 1.5rem;
    padding: 1.5rem;
    background: #fff;
    border:.1rem solid #eee;
    display: block;

}

.home .content h3{
    font-size: 2rem;
}

.home .content span{
    font-size: 5.8rem;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

.icons-container .icons h3{
    font-size: 1.3rem;
   }

   .icons-container .icons span{
    font-size: 1.7rem;
   }

   header .mainlist a:hover {
    color: #d91dff;
}

}



/*when screen <754*/

@media (max-width:754px) {
.home{
    background: url(flowe.png);
}

}



/*when screen < 625*/


@media (max-width:625px) {

.home .content span{
    font-size: 5rem;
}

}


/*when screen < 400*/

@media (max-width:400px) {

html{
    font-size: 50%;
}

.heading{
    font-size: 3rem;
}


}
.home {
    gap: 300px;
  }


.profile-image{
    width: 500px;
    height: 500px;
}
    </style>
</head>


<body>

   <!-- The start of header -->
    <header> 
        <input type="checkbox"  id="chlist">
        <label for="chlist" class="fas fa-bars"></label>

        <a href="#" class="logo">Data<span>base</span></a>

        <nav class="mainlist">
            <a href="index_customer.php">Customer</a>
            <a href="index_car.php">Car</a>
            <a href="index_carpart.php">Car_Part</a>
            <a href="index_device.php">Device</a>
            <a href="index_manu.php">Manufacture</a>
            <a href="index_orders.php">Orders</a> 
            <a href="index_address.php">Address</a> 
        </nav>

        <div class="icons">
            <a class="fas fa-heart"></a>
            <a href="logout.php"><input type="submit" name="" value="LogOut" style="
                color: black; hieght: 80px; width: 80px; 
                 font-size: 15px;border:2;border-radius:5px; cursor: pointer;"></a>
        </div>

    </header>
  <!-- The end of header -->




  <!-- The start of home section  -->

  <section class="home" id="home">

      <div class="content">
        <h3>Hello Everyone, In</h3>
        <span>Cars DataBase</span>
        <p>By Zainab Atwa : Software Engineering Student|2003</p>
      
      </div>
      <img src="bb.png" alt="Description of Image" class="profile-image">

  </section>

  <!-- The end of home section  -->

    <!--the start of footer section-->

    <section class="footer">
        <h1>.</h1>
        <div class="end">     
            <p class="dont">Do not hesitate to communicate with me <br><br></p>
    
             <div class="con">
             <a href="https://www.instagram.com/accounts/login/?hl=en" class="fa fa-instagram" style="font-size:40px;color:rgb(255, 255, 255)"></a>
             <a href="https://www.linkedin.com/"  class="fa fa-linkedin-square" style="font-size:40px;color:rgb(255, 255, 255)"></a>
             <a href="https://github.com/" class="fa fa-github" style="font-size:40px;color:rgb(255, 255, 255)"></a>
            </div>
            
        </div>
    
    </section>
        
    </body>
    </html>