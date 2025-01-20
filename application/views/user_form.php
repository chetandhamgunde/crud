<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
</head>
<body>

    <?php echo validation_errors(); ?> <!-- Display validation errors -->

    <?php echo form_open('AccountController/add_user'); ?>
    <!-- Form action to controller method -->

    <h2>User Form</h2>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo set_value('name'); ?>"><br><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>"><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>

    <input type="submit" value="Submit">

    <?php echo form_close(); ?> <!-- End of form -->

</body>
</html>
