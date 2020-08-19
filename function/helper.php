<?php
function login ($koneksi, $email, $password) {

    $login = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email = '$email' AND password = '$password'");
    $user = mysqli_fetch_array($login);

    $email1 = $user['email'];
    $password1 = $user['password'];

    if($email == $email1 && $password == $password1) {
        $_SESSION['position'] = $user['position'];
        $_SESSION['id'] = $user['id'];
        header('location: home.php?login=true');
    } else {
        ?>
            <script> var login = true; </script>
        <?php
    }
    
}

function logut () {
    header('location: index.php');
}
?>