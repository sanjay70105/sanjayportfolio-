<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        form {
            width: 600px;
            margin-top: 100px;
            margin-left: 40px;
        }
        .one {
            width: 300px;
            display: flex;
            flex-direction: column;
            margin-bottom: 14px;
        }
        label {
            display: flex;
            margin-bottom: 2px;
            justify-content: flex-start;
        }
        input {
            width: 100%;
            padding: 7px;
            border-radius: 14px;
        }
        textarea {
            width: 100%;
            padding: 20px;
        }
        #button {
            width: 140px;
            padding: 9px;
            background-color: green;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <div class="one">
            <label>Name:</label>
            <input type="text" placeholder="Enter Your Name" name="name" required>
        </div> 
        <div class="one">
            <label>Email:</label>
            <input type="email" placeholder="Enter Your Email" name="email" required>
        </div> 
        <div class="one">
            <label>Phone Number:</label>
            <input type="number" name="phoneno" placeholder="Enter your phone No" required>
        </div> 
        <div class="one">
            <label>Address:</label>
            <textarea name="message" placeholder="Enter your message" required></textarea>
        </div> 
        <input type="submit" value="Submit" id="button">
        <p style="color:red"><?php echo isset($recieve) ? $recieve : ''; ?></p>
    </form>

    <?php
        
        require 'Projects/prac/PHPMailer-master/src/Exception.php';
        require 'phpmailer/src/PHPMailer.php';
        require 'phpmailer/src/SMTP.php';
        
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phoneno'];
            $message = $_POST['message'];
        
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'sanjaymanimar@gmail.com';    
                $mail->Password   = 'Sanju@132';     
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
        
                // Recipients
                $mail->setFrom($email, $name);   
                $mail->addAddress('sanjaymanimar@gmail.com');      
        
                // Content
                $mail->isHTML(true);
                $mail->Subject = 'New Contact Form Submission';
                $mail->Body    = "Name: $name <br> Email: $email <br> Phone: $phone <br> Message: $message";
                $mail->AltBody = "Name: $name \n Email: $email \n Phone: $phone \n Message: $message";
        
                $mail->send();
                $recieve = 'Your message has been sent successfully!';
            } catch (Exception $e) {
                $recieve = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        
            }
    ?>
</body>
</html>