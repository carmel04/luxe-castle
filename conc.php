
<?php
    session_start(); 
    include("./includes/head.php");
?>

<style>
.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <link></link>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2><b><u>Contact Us</u></b></h2>
    </header>
    <section class="contact-form">
        
        <p>If you have any questions or inquiries, please feel free to contact us.</p>
        <form action="process.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </section>
    <footer>
        <p>&copy; Luxe Castle</p>
    </footer>
</body>
</html>
<?php include("./includes/footer.php");?>