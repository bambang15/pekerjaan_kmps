<?php
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['inputFirstName']) && isset($_POST['inputLastName']) &&
        isset($_POST['inputEmail']) && isset($_POST['inputPassword']) &&
        isset($_POST['inputPasswordConfirm'])
    ) {
        $first_name = $_POST['inputFirstName'];
        $last_name = $_POST['inputLastName'];
        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];
        $password_confirm = $_POST['inputPasswordConfirm'];

        if ($password == $password_confirm) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                $register_message = "Registration successful! You can now log in.";
            } else {
                $register_message = "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $register_message = "Password and confirm password do not match.";
        }
    } else {
        $register_message = "Please fill in all the required fields.";
    }
}
?>

<!-- Tampilkan pesan registrasi (jika ada) -->
<?php if (!empty($register_message)): ?>
    <!DOCTYPE html>
    <html>
    <head>
        <!-- Head section, including CSS and JavaScript links -->
    </head>
    <body>
        <div class="alert alert-info mt-3" role="alert">
            <?php echo $register_message; ?>
        </div>
    </body>
    </html>
<?php endif; ?>
