<?php
    session_start();

    error_reporting(E_ERROR | E_PARSE);

    if($_SESSION["type"] == "admin") header("Location: admin_dashboard.php");

    if(isset($_POST["submit_message"])) {
        $name = htmlspecialchars($_POST["name"]);
        $email = $_POST["email"];
        $subject = htmlspecialchars($_POST["subject"]);
        $message = htmlspecialchars($_POST["message"]);
        $errName = "";
        $errEmail = "";
        $errInvalidEmail = "";
        $errSubject = "";
        $errMessage = "";

        $message_delivered = "";


        if(!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
            $connect = mysqli_connect("localhost", "hdtdywpk_burgershot", "NBAp76!$%", "hdtdywpk_burgershot") or die("ERROR: Could not connect. " .  $connect->connect_error);;
            

            if(strlen($name) > 6 && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($subject) > 2 && strlen($message) > 10) {
                $sql = "INSERT INTO client_messages (image, fullname, email, subject, message) VALUES ('default.jpg', '$name', '$email', '$subject', '$message')";
                mysqli_query($connect, $sql);

                $name = "";
                $email = "";
                $subject = "";
                $message = "";
            } else {
              if(strlen($name) <= 6) $errName = "Your name is too short!";
              if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errEmail = "Your email is invalid!";
              if(strlen($subject) <= 2) $errSubject = "Your subject is too short!";
              if(strlen($message) <= 10) $errMessage = "Your message is too short!";
            }
        } else {
            if(empty($name)) $errName = "Name is required!";
            if(empty($email)) $errEmail = "Email is required!";
            if(empty($subject)) $errSubject = "Subject is required!";
            if(empty($message)) $errMessage = "Message is required!";

            echo "<script>location.href = '#title_contact';</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mark Jigger Masacupan">
  	<meta name="description" content="The owners dreamed of creating a burger restaurant in which the customers could not only eat, but one that offered a friendly and healthy environment. The restaurant???s success led them to begin franchising their concept, becoming operating restaurants.">
  	<meta property="og:title" content="Burger Shot Restaurant | Contact Us">
    <meta property="og:url" content="https://Burgershot.x10.mx/contact-us.php">
    <meta property="og:image" content="images/website-image.jpg">
    <link rel="icon" type="image/any-icon" href="images/Burgershot.ico">
    <?php
        if(empty($_SESSION["email"])) echo '<link rel="stylesheet" href="css/header.css">'; 
        if($_SESSION["type"] == "client") echo '<link rel="stylesheet" href="css/client_header.css">'; 
    ?>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>Burger Shot</title>
</head>
<body>
    <?php include_once 'header.php' ?>
    
    <!-- Burger Shot Contact Us Page -->
    <main>
        <!-- Burger Shot Contact Map -->
        <section class="section_contact-page">
            <div class="container_map">
                <h1>Contact Us</h1>
                <iframe src="https://www.google.com/maps/embed?pb=!4v1669720487975!6m8!1m7!1s8xBObS6d8dWBZo11fNKmSA!2m2!1d14.404934524249!2d121.4646484715352!3f0.8884567076667516!4f-2.4187483015293054!5f1.0782917280212074" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

        <!-- Burger Shot Contact Form -->
        <section class="section_contact-form">
            <div class="container_contact">
                <div class="container_form">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="contactForm">
                        <h1 id="title_contact">Get in Touch</h1>
                        <div class="container_name-and-email">
                            <label for="name">
                                <p>Name</p>
                                <input type="text" name="name" id="name" placeholder="Enter your name" autocomplete="name" value="<?php echo isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) ? $_SESSION["firstname"] . " " . $_SESSION["lastname"]: (isset($_POST["name"]) ? $name : "") ?>">
                                <p class="err_message"><?php echo $errName ?></p>
                            </label>
                            <label for="email">
                                <p>Email</p>    
                                <input type="text" name="email" id="email" placeholder="Enter your email" autocomplete="email" value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : (isset($_POST["email"]) ? $email : "") ?>">
                                <p class="err_message"><?php echo $errEmail ?></p>
                            </label>
                        </div>
                        <label for="subject">
                            <p>Subject</p>
                            <input type="text" name="subject" id="subject" placeholder="Enter your subject" value="<?php echo isset($_POST["subject"]) ? $subject : "" ?>">
                            <p class="err_message"><?php echo $errSubject ?></p>
                        </label>
                        <label for="message">
                            <p>Message</p>
                            <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message"><?php echo isset($_POST["message"]) ? $message : "" ?></textarea>
                            <p class="err_message"><?php echo $errMessage ?></p>
                        </label>
                        <button type="submit" id="submit_message" name="submit_message"><span><i class="fa-solid fa-paper-plane"></i></span> SEND</button>
                    </form>
                </div>
            </div>
        </section>
        <?php
            if($message_delivered) echo '<section class="section_modal-message-success">
                                            <div class="container_modal-message-success">
                                                <div class="animation-ctn">
                                                    <div class="icon icon--message-success svg">
                                                        <svg width="80px" height="80px">  
                                                            <g fill="none" stroke="#22AE73" stroke-width="5"> 
                                                            <circle cx="40" cy="40" r="36" style="stroke-dasharray:400px, 400px; stroke-width: 2px;"></circle>
                                                            <circle id="colored" fill="#22AE73" cx="40" cy="40" r="36" style="stroke-dasharray:400px, 400px;"></circle>
                                                            <polyline class="st0" stroke="#fff" stroke-width="15" points="48.5, 87.8 67.7, 107.9 112.2, 52.4" style="stroke-dasharray: 100px,  100px; stroke-linejoin: round;"/>   
                                                            </g> 
                                                        </svg>
                                                        </div>
                                                </div>
                                                <h1>You message has been delivered!</h1>
                                                <p>Go to your email and check you spam or inbox.</p>
                                                <p>We will try to give feedback as soon as possible to you.</p>
                                                <button type="button" aria-label="Message sent" id="btn_message">Thank you!</button>
                                            </div>
                                        </section>';
        ?>
    </main>
    
    <?php include_once 'global_footer.php' ?>

    <script src="js/contact-us.js"></script>
</body>
</html>