<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Yonas MS Blog Detail Page</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="cus.css">
        <style>
                .cart-count {
            background-color: red;
            color: white;
            font-size: 12px;
            font-weight: bold;
            border-radius: 50%;
            padding: 2px 6px;
            position: absolute;
            top: -5px;
            right: -5px;
}
        </style>
    </head>

    <body>
       <?php 
        $page = 'blog';
        $id=$_GET['id'];
       include "header.php"?>
 <section id="page-header" class="blog-header" style="background-image:url('img/banner/s4.jpg')">
                
                <h2 style="color: black;">#ReadMore</h2>
               
                <p>Read all case studies about our Products!</p>    
 </section>

 <section id="blog">
     <div class="blog-box">
        <?php
             $sql = "SELECT * from blog WHERE id=$id";
           
             $run = mysqli_query($conn,$sql);
 
             if($run->num_rows > 0){
 
                 while($row=$run->fetch_assoc()){
                     $id=$row['id'];
                     $img=$row['img'];
                     $title=$row['Title'];
                     $para1=$row['para1'];
                     $para2=$row['para2'];
                     $para3=$row['para3'];
                     

                     echo "
                     <div class='blog-img'>
            <img src='../images/$img' alt='no image '>
        </div>

         <div class='blog-details'>
             <h4>$title </h4>

<p>
$para1
</p>

<p>
$para2
</p>
<p>$para3</p>
             <a href='blog.php'>Back</a>
         </div>

                     ";
                    
                    
                    }}
        ?>
        <!-- <div class="blog-img">
            <img src="img/A/a5a.jpg" alt="no image ">
        </div>

         <div class="blog-details">
             <h4>Ampicillin </h4>

<p>Ampicillin 
Generic name: ampicillin (oral) [ am-pi-SIL-in ]
Dosage forms: oral capsule (250 mg; 500 mg), oral powder for reconstitution (125 mg/5 mL; 250 mg/5 mL)
Drug class: Aminopenicillins
Medically reviewed by Drugs.com on Apr 24, 2023. Written by Cerner Multum.

What is ampicillin?
Ampicillin is a penicillin antibiotic that is used to treat or prevent many different types of infections such as bladder infections, pneumonia, gonorrhea, meningitis, or infections of the stomach or intestines.
</p>

<p>Ampicillin may also be used for purposes not listed in this medication guide.

Warnings
Follow all directions on your medicine label and package. Tell each of your healthcare providers about all your medical conditions, allergies, and all medicines you use.

Before taking this medicine
You should not use ampicillin if you are allergic to ampicillin or any similar antibiotic, such as amoxicillin (Amoxil, Augmentin, Moxatag, and others), dicloxacillin, nafcillin, or penicillin.

Tell your doctor if you have ever had:

diabetes;

hay fever (seasonal allergy);

asthma;

diarrhea caused by taking antibiotics;

kidney disease; or

an allergy to a cephalosporin antibiotic.

Tell your doctor if you are pregnant.
</p>
<p>Ampicillin can make birth control pills less effective. Ask your doctor about using non hormonal birth control (condom, diaphragm with spermicide) to prevent pregnancy.

You should not breast-feed while using ampicillin.

Do not give this medicine to a child without medical advice.</p>
             <a href="blog.php">Back</a>
         </div> -->

     </div>
 </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4> We value your feedback!</h4>
            <p>  Your opinion matters to us, and we are eager to hear your thoughts. <br>Please take a moment to share your feedback so that we can continue<br> to enhance our services and meet your expectations.  <span> Thank you!</span> </p>
        </div>
        <div class="form">
          <a href="feedback.php">  <button class="normal">Give Feedback</button> </a>
        </div>
    </section>

<footer class="section-p1">
        <div class="col">
           <div style="display: flex;"> <i class="fas fa-heartbeat fa-2x" style="color:darkgreen;"></i> &nbsp <span style="color: var(--black); font-size: 2.0rem;"> Yonas <b>M S </b> </span>  </div> <br>

            <h4>Contact</h4>
            <p> <strong>Address: </strong> GONDAR ETHIOPIA</p>
            <p> <strong>Phone: </strong> +251 0000 000</p>
            <p> <strong>Hours: </strong> 8:00 - 10:00, Mon - Sun</p>
            <div class="follow">
                <h4>Follow Us</h4>
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-telegram"></i>
                <i class="fab fa-youtube"></i>
                <i class="fab fa-instagram"></i>
            </div>
        </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="about.php">About us</a>
            <a href="help.php">Delivery Information</a>
            <a href="setting.php">Terms & Conditions</a>
            <a href="contact.php">Contact us</a>
        </div>
        <div class="col">
            <h4>Account</h4>
            <a href="update.php">Update Account</a>
            <a href="cart.php">View Cart</a>
            <a href="order.php">Send Order Request</a>
            <a href="help.php">Help</a>
        </div>
        <div class="col install" style="display: flex;">
            <h3 style="font-size:15px; font-weight: 500;">secure Payment GAteways</h3>
            <img src="img/pay/pay.jpg" alt="" style="width:200px; height: 80px; position: center;"> <br> 
            <img src="img/pay/pay2.jpg" alt="" style="width:200px; height: 80px; position: center;">
        </div>
        <div class="copyright">
            <p> 2015 FM.NET SQUAD ALL RIGHTS RESERVED!</p>
        </div>
</footer>
        <script src="cus.js"></script>
        <script src="script.js"></script>
    </body>
 
</html>
