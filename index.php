<?php
include('DBconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        form input, form textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            outline: none;
        }

        textarea {
            height: 150px;
        }

        input[type="submit"] {
            grid-column: span 2;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 14px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50; /* Green background for the default button */
            border: none; /* Remove borders */
            color: white; /* White text */
            padding: 10px 15px; /* Some padding */
            text-align: center; /* Centered text */
            text-decoration: none; /* Remove underline */
            display: inline-block; /* Make the buttons inline */
            font-size: 16px; /* Increase font size */
            margin: 4px 10px; /* Add some margin for spacing */
            cursor: pointer; /* Pointer/hand icon on hover */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s; /* Smooth transition for background color */
}


        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .full-width {
            grid-column: span 2;
        }
        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px; /* Increased gap between input fields */
        }

    </style>
</head>
<body>

<div class="container">
    <h2>Let's get in touch</h2>
    <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Your name*" required>
        <input type="text" name="company" placeholder="Your Company name*" required>
        <input type="email" name="email" placeholder="Your email address*" required>
        <input type="text" name="phone" placeholder="Your phone" pattern="^\+?[0-9]{10}$" title="Please enter a valid phone number (10 to 15 digits, optional '+' at the start)">
        <textarea name="message" placeholder="Your message" class="full-width"></textarea>

        <input type="submit" value="Submit" name="btnsub">
        
    </form>
</div>

</body>
</html>

<?php

if(isset($_POST['btnsub'])){
    $name = $_POST['name'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    
    $stmt = $con->prepare("INSERT INTO info_table (fname, company, email, phone, msg ) VALUES (?, ?, ?, ?, ?)");
            if (!$stmt) {
                die("Prepare failed: " . $con->error);
            }

            $stmt->bind_param("sssis", $name, $company, $email, $phone, $message);

            if ($stmt->execute()) {
                echo "<script>alert('You have successfully inserted the data');</script>";
                echo "<script type='text/javascript'> document.location ='view.php'; </script>";
            } else {
                echo "<script>alert('Execute failed: " . $stmt->error . "');</script>";
            }
            $stmt->close();
        }
    
    ?>


