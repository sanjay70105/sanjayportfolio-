<?php
      $info="";
    require 'phpMailer-master/src/Exception.php';
    require 'phpMailer-master/src/PHPMailer.php';
    require 'phpMailer-master/src/SMTP.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name=$_POST['fname'];
        $email=$_POST['email'];
        $mobileno=$_POST['mobileno'];
        $emailsub=$_POST['emailsub'];
        $message=$_POST['message'];
    
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'sanjaymanimar@gmail.com';    
            $mail->Password   = 'yrcd eomj pdap tpkh';     
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => true,
                    'verify_peer_name' => true,
                    'allow_self_signed' => false
                )
            );
        
            $mail->setFrom($email, $name);   
            $mail->addAddress('sanjaymanimar@gmail.com');      
            $mail->SMTPdebug=2;
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New Contact Form Submission';
            $mail->Body    = "Name: $name <br> Email: $email <br> Phone: $mobileno <br> Subject: $emailsub <br>  Message: $message";
            $mail->AltBody = "Name: $name \n Email: $email \n Phone: $mobileno \n Message: $message";
    
            $mail->send();
            header("Location: ".$_SERVER['REQUEST_URI']."?success=1");
            exit();
        } catch (Exception $e) {
            // Redirect back with error info
            header("Location: ".$_SERVER['REQUEST_URI']."?success=0&error=" . urlencode($mail->ErrorInfo));
            exit();
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/port.css">
    <link rel="icon" href="../ASSERT/images.jpg">
    <script src="../jquery/jquery.js"></script>
    <script src="../jsfile/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&family=Great+Vibes&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&family=Matemasie&family=Playball&family=Sofia+Sans+Extra+Condensed:ital,wght@0,1..1000;1,1..1000&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playwrite+DE+Grund:wght@100..400&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="0">
    <div class="header" >
        <nav class="navbar navbar-expand-sm hed p-3 fixed-top" data-aos="slide-down" data-aos-duration="2000"  >
            <div class="container-fluid">
                <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#mu" style="background-color:aqua;" ><span  class="navbar-toggler-icon "   ></span></button>
                <h1 class="navbar-brand to " style="font-family: 'New Amsterdam', sans-serif; font-size:xx-large;color: rgb(59, 243, 236);">Portfolio</h1>
                <div class="collapse navbar-collapse ">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a href="#about-mesection" class="nav-link" style="color:whitesmoke">About Me</a></li>
                        <li class="nav-item"><a href="#section2" class="nav-link" style="color:whitesmoke">Skills</a></li>
                        <li class="nav-item"><a href="#projects-section" class="nav-link" style="color:whitesmoke">Projects</a></li>
                        <li class="nav-item"><a href="#contact" class="nav-link" style="color:whitesmoke">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="offcanvas offcanvas-start " id="mu" style="background-color: rgba(30, 28, 28, 0.858);color:white">
            <div class="offcanvas-header ">
                <h1 class="offcanvas-title" style="color:rgba(68, 238, 176, 0.761);font-family: 'poppins',sans-serif;">Portfolio</h1>
                <button class="btn btn-close" data-bs-dismiss="offcanvas" style="background-color:rgb(252, 37, 37);" ></button>
            </div>
            <div class="offcanvas-body" >
                <ul class="navbar-nav ms-auto ki" style="font-family: 'Poppins',sans-serif;">
                    <li class="nav-item"><a href="#about-mesection" class="nav-link" style="color:rgb(17, 16, 16)">About Me</a></li>
                        <li class="nav-item"><a href="#section2" class="nav-link" style="color:rgb(14, 12, 12)">Skills</a></li>
                        <li class="nav-item"><a href="#projects-section" class="nav-link" style="color:rgb(13, 12, 12)">Projects</a></li>
                        <li class="nav-item"><a href="#contact" class="nav-link" style="color:rgb(20, 18, 18)">Contact</a></li>
                </ul>
            </div>

        </div>
    </div>
    <!-- Profile section-->
    <div class="second" id="profile" >
    <div class="container  pp " >
        <div class="row">
            <div class="col-md-6" data-os="zoom-out-right" data-aos-duration="2000">
            <img class="img-fluid frt" src="../ASSERT/man.png">
        </div>
        <div class="col-md-6"data-aos="zoom-out-left" data-aos-duration="1000">
      <div class="container mt-5 text-white  ">
                <h2  style= " font-family: 'Lobster Two', sans-serif;">Hello It's Me</h2>
                <h1  style= " font-family: 'Lobster Two', sans-serif; color:aquamarine">Sanjay M</h1>
                <h2  style= " font-family: 'Lobster Two', sans-serif;">And I'm a <em style="color:aqua" id="res"></em></h2>
                <p style="color:rgb(155, 160, 144)">A passionate full stack web developer thrives on creating seamless user experiences, mastering both front-end and back-end technologies with enthusiasm</p>
            <div class="small">
                <h2><a href="https://x.com/SSanjayuu"target="_blank" id="a4"  ><i class="fa-brands fa-x-twitter"></i></a></h2>
                <h2><a href="https://www.instagram.com/sanjay_143aq/" target="_blank" id="a1"><i class="fa-brands fa-instagram"></i></a></h2>
                <h2><a href="https://www.linkedin.com/in/sanjay-mani-383b57270/" target="_blank" id="a3"><i class="fa-brands fa-linkedin"></i></a></h2>
                <h2><a href="https://github.com/sanjay70105"target="_blank" id="a2"><i class="fa-brands fa-github"></i></a></h2>
             </div>
          <a href="https://drive.google.com/file/d/1_wr1e7OEyB5XxhQbw7Ay-jUFBvbDGdwb/view?usp=drive_link"target="_blank"  ><button id="about" >Download Cv</button></a>
             </div>

       
            </div>
        </div>
        </div>
           
        </div>
</div>
<script>
  AOS.init({
  disable: 'mobile' 
});
AOS.init({
  disable: function() {
    var maxWidth = 770; 
    return window.innerWidth < maxWidth;
  }
  
});
</script>
   
    <!--About me  Section-->
    <div class="container about-me" id="about-mesection" style="position: relative; padding: 60px 20px; background-color: #f9f9f9; border-radius: 10px;" data-aos="flip-up" data-aos-duration="1000" data-aos-offset="400"  data-aos-easing="ease-in-out" >
        <h1 class="about-title text-center" style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 36px; color: #0e8db5; margin-bottom: 20px;">
            About Me
        </h1>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="../ASSERT/sanjay.M.jpg" alt="Sanjay M" class="img-fluid rounded-circle" style="width: 200px; height: 200px; object-fit: cover; border: 5px solid #0e8db5; padding:5px;">
            </div>
            <div class="col-md-8">
                <p class="about-description" style="font-family: 'Poppins', sans-serif; font-size: 16px; line-height: 1.7; color: #333;">
                    I am <strong>Sanjay M</strong>, a passionate front-end developer with a strong foundation in computer science. I completed my schooling at Velammal Matriculation Higher Secondary School and pursued a Bachelor of Engineering in Computer Science and Engineering from RMK College of Engineering and Technology, where I achieved a CGPA of <strong>8.3</strong>.
                </p>
                <p class="about-description" style="font-family: 'Poppins', sans-serif; font-size: 16px; line-height: 1.7; color: #333;">
                    During my academic journey, I developed a deep interest in front-end development, focusing on creating intuitive, responsive, and visually appealing user interfaces. My projects have involved working with modern web technologies, including HTML, CSS, JavaScript, and frameworks like Angular. I am particularly skilled in translating design concepts into functional code and optimizing the user experience.
                </p>
                <p class="about-description" style="font-family: 'Poppins', sans-serif; font-size: 16px; line-height: 1.7; color: #333;">
                    I am committed to continuous learning and staying updated with the latest trends in web development. I have a keen eye for detail and a strong understanding of design principles, allowing me to deliver high-quality, user-centric web applications. My goal is to contribute to innovative projects that push the boundaries of what's possible on the web.
                </p>
            </div>
        </div>
    </div>
    
          <!--Skills Section-->
          <h1 class="projects">My Skills</h1>

          <div class="container mt-5 mb-5 myskill" style="color:white;" id="section2">
            <div class="row">
                <div class="col-md-4 col-lg-4" style="padding:10px;">
                    <h2 style="color:rgb(246, 86, 28)"><i class="fa-brands fa-html5"></i></h2>
                    <div class="inner">
                        <h5>HTML</h5>
                        <p class="progress-percent" data-percentage="95">95%</p> 
                    </div>
                    <div class="progress pb1">
                        <div class="progress-bar" style="width: 0%; background-color:rgb(163, 40, 225)"></div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4" style="padding:10px;">
                    <h2 style="color:rgb(17, 71, 232);"><i class="fa-brands fa-css3"></i></h2>
                    <div class="inner">
                        <h5>CSS</h5>
                        <p class="progress-percent" data-percentage="86">86%</p> 
                    </div>
                    <div class="progress pb1">
                        <div class="progress-bar" style="width: 0%; background-color:rgb(163, 40, 225)"></div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4" style="padding:10px;">
                    <h2 style="color:rgb(176, 10, 218)"><i class="fa-brands fa-bootstrap"></i></h2>
                    <div class="inner">
                        <h5>Bootstrap</h5>
                        <p class="progress-percent" data-percentage="89">89%</p>
                    </div>
                    <div class="progress pb1">
                        <div class="progress-bar" style="width: 0%;background-color:rgb(163, 40, 225)"></div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4" style="padding:10px;">
                    <h2 style="color:rgb(218, 208, 10)"><i class="fa-brands fa-js"></i></h2>
                    <div class="inner">
                        <h5>Javascript</h5>
                        <p class="progress-percent" data-percentage="80">80%</p>
                    </div>
                    <div class="progress pb1">
                        <div class="progress-bar" style="width: 0%;background-color:rgb(163, 40, 225)"></div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4" style="padding:10px;">
                    <h2 style="color:orangered"><i class="fa-brands fa-angular"></i></h2>
                    <div class="inner">
                        <h5>Angular JS</h5>
                        <p class="progress-percent" data-percentage="78">78%</p>
                    </div>
                    <div class="progress pb1">
                        <div class="progress-bar" style="width: 0%;background-color:rgb(163, 40, 225)"></div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4" style="padding:10px;">
                    <h2 style="color:burlywood"><i class="fa-brands fa-php"></i></h2>
                    <div class="inner">
                        <h5>PHP</h5>
                        <p class="progress-percent" data-percentage="85">85%</p>
                    </div>
                    <div class="progress pb1">
                        <div class="progress-bar" style="width: 0%;background-color:rgb(163, 40, 225)"></div>
                    </div>
                </div>
            </div>
        </div>
    <!--Professional skills Section-->
    <h1 class="projects">Professional Skills</h1>
        <div class="container   pskill" style="color: white; font-family: 'Sofia Sans Extra Condensed', sans-serif;margin-bottom: 80px;margin-top: 80px;" >
            
            <div class="row">
                <div class="col-6 col-md-3 " >
                    <h5 class="p-2 " style="color:rgb(28, 251, 199);font-weight: bolder;">Problem Solving</h5>
                    <div class="progress-circle" style="--percentage: 75%;">
                        <span style="color: black;">75%</span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <h5 class="p-2" style="color:rgb(28, 251, 199);font-weight: bolder;">Interpersonal</h5>
                    <div class="progress-circle" style="--percentage: 81%;" >
                        <span style="color: black;">81%</span>
                    </div>
                </div>
                <div class="col-6 col-md-3" >
                    <h5 class="p-2" style="color:rgb(28, 251, 199);font-weight: bolder;">Creativity</h5>
                    <div class="progress-circle" style="--percentage: 73%;">
                        <span style="color: black;">73%</span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <h5 class="p-2" style="color:rgb(28, 251, 199);font-weight: bolder;">Team Work</h5>
                    <div class="progress-circle" style="--percentage: 88%;" >
                        <span style="color: black;">88%</span>
                    </div>
                </div>
                
           </div>
        </div>
  
        <!--projects -->
        <h1 class="projects">Projects</h1>
        <div class="container" id="projects-section" style="margin-top:90px;margin-bottom:60px;" >
            <div class="row portfolio-container" >
                <div class="col-12 col-sm-6  col-lg-4 portfolio-box"data-aos="fade-right" data-aos-offset="250"data-aos-easing="ease-in-sine">
                    <img src="../ASSERT/pj1.avif" alt="Web Design" class="img-fluid">
                    <div class="portfolio-layer">
                        <h4>Nostra Shopping web design</h4>
                        <p>This project is all about the basic shopping website using html,css and javascript.</p>
                        <a href="https://sanjay70105.github.io/Nostra-/index.html" target="_blank" class="btn btn-danger">Project link</a>
                    </div>
                </div>
                <div class="col-12 col-sm-6  col-lg-4 portfolio-box"data-aos="fade-down" data-aos-offset="250" data-aos-easing="ease-in-sine">
                    <img src="../ASSERT/big.jpg.jpg" alt="Web Design" class="img-fluid">
                    <div class="portfolio-layer">
                        <h4>Liberty NFT MarketPlace</h4>
                        <p>THis website is a just  a try of liberty nft marketplace website with use of HTML,Bootstrap and css</p>
                        <a href="https://sanjay70105.github.io/Liberty-nf-sample/" target="_blank" class="btn btn-danger">Project link</a>
                    </div>
                </div>
                <div class="col-12 col-sm-6  col-lg-4 portfolio-box"data-aos="fade-left" data-aos-offset="250" data-aos-easing="ease-in-sine">
                    <img src="../ASSERT/whack.avif" alt="Web Design" class="img-fluid">
                    <div class="portfolio-layer">
                        <h4>Whack a Mole</h4>
                        <p>THis whack a Mole game  is developed with javascript.It was a designed in pure Js. </p>
                        <a href="https://sanjay70105.github.io/whack-and-mole/" target="_blank" class="btn btn-danger">Project link</a>
                    </div>
                </div>
                <div class="col-12 col-sm-6  col-lg-4 portfolio-box"data-aos="fade-right" data-aos-offset="250"data-aos-easing="ease-in-sine">
                    <img src="../ASSERT/todo.avif" alt="Web Design" class="img-fluid">
                    <div class="portfolio-layer">
                        <h4>ToDo List</h4>
                        <p>THis website is about simple todo list by HTML,Bootstrap and jquery</p>
                        <a href="https://sanjay70105.github.io/Todo-List-/" target="_blank" class="btn btn-danger">Project link</a>
                    </div>  
                </div>
                <div class="col-12 col-sm-6  col-lg-4 portfolio-box"data-aos="fade-down" data-aos-offset="250" data-aos-easing="ease-in-sine">
                    <img src="../ASSERT/shop.avif" alt="Web Design" class="img-fluid">
                    <div class="portfolio-layer">
                        <h4>Add to cart in shopping website</h4>
                        <p>THis website is about the basic add to cart the products by using Jquery </p>
                        <a href="https://sanjay70105.github.io/shopsy-/" target="_blank" class="btn btn-danger">Project link</a>
                    </div>
                </div>
                <div class="col-12 col-sm-6  col-lg-4 portfolio-box"data-aos="fade-left" data-aos-offset="250" data-aos-easing="ease-in-sine">
                    <img src="../ASSERT/user.avif" alt="Web Design" class="img-fluid">
                    <div class="portfolio-layer">
                        <h4>Mind Game</h4>
                        <p>THis website is about mind game with angular js </p>
                        <a href="https://sanjay70105.github.io/Mind-game/" target="_blank" class="btn btn-danger">Project link</a>
                    </div>
                </div>
            </div>
        </div>
            <!--Contact Page-->
            <div class=" container contact" id="contact" data-aos="fade-right" data-aos-offset="400" data-aos-easing="ease-in-sine" >
                <h1 class="projects" style="margin-top: 60px;margin-bottom: 60px;">Contact Me!</h1>
                
        
                <form action="" method="post">
                    <div class="input-box">
                        <input type="text" placeholder="Full Name" name="fname">
                        <input type="email" placeholder="Email Address" name="email">
                    </div>
                    <div class="input-box">
                        <input type="number" placeholder="Mobile Number" name="mobileno" >
                        <input type="text" placeholder="Email Subject" name="emailsub">
                    </div>
                    <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message" name="message"></textarea>
                    <input type="submit" value="Send Message" class="btn btn-primary" id="click">
                    
                </form>
                    <p class="mess" style="color:white;background-color: rgba(19, 194, 19, 0.658);"> Your message has been received.</p>
            <style>
                .mess{
                    display: none;
                    padding:7px;
                    }
</style>
                </div>
            <div class="container mt-5 mb-5"data-aos="fade-left" data-aos-offset="400" data-aos-easing="ease-in-sine">
              
                <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d73877.25183079959!2d80.1623819653733!3d13.306997795852444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1sen!2sin!4v1727875792696!5m2!1sen!2sin"
                        width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            
            <footer class="footer" style="background-color: #0e8db5; padding: 20px 0;">
                <div class="container text-center">
                    <div class="footer-text" style="margin-bottom: 10px;">
                        <p style="color: #fff;  font-family: 'Playwrite DE Grund', cursive, sans-serif; font-size: 17px; margin: 0;">
                            &copy; 2023 | Designed by Sanjay M | All Rights Reserved.
                        </p>
                    </div>
            
                    <div class="social-icons" style="margin-top: 15px;">
                        <a href="https://www.linkedin.com/in/sanjay-mani-383b57270/" target="_blank" style="margin: 0 10px; color: #0a0a0a;">
                            <i class="fa-brands fa-linkedin fa-2x"></i>
                        </a>
                        <a href="https://github.com/sanjay70105" target="_blank" style="margin: 0 10px; color: #070707;">
                            <i class="fa-brands fa-github fa-2x"></i>
                        </a>
                        <a href="mailto:sanjaymanimar@gmail.com" style="margin: 0 10px; color: #121111;">
                            <i class="fa-solid fa-envelope fa-2x"></i>
                        </a>
                    </div>
                </div>
            </footer>
            
        
                <div class="footer-iconTop" id="scrollTopButton">
                    <a href="#profile" style="text-decoration: none; background-color: #f1c40f; border-radius: 50%; padding: 10px 14px;">
                        <i class="fa-solid fa-arrow-up" style="color: #0c0c0c;"></i>
                    </a>
                </div>
 <script src="../JAVASCRIPT/port.js"></script>
 <script>
    const urlParams = new URLSearchParams(window.location.search);
    const success = urlParams.get('success');
    
    if (success === '1') {
        document.querySelector('.mess').textContent = "Your message has been received.";
        document.querySelector('.mess').style.display = 'block';
    } else if (success === '0') {
        document.querySelector('.mess').textContent = "Failed to send your message. Please try again.";
        document.querySelector('.mess').style.display = 'block';
    }
    setTimeout(function() {
        document.querySelector('.mess').style.display = 'none';
    }, 15000);
</script>
    
</body>
</html> 