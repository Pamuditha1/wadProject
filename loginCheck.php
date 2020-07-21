<?php 
    
    $uname = $_POST['uname'];
    $pass = $_POST['pswrd'];

    if ($uname == "admin" && $pass == "ADMIN") {
        echo'<script>

            window.open("showDatabase.php");
            document.location.reload(true);

        </script>
        ';

    } else {
        echo '
           <script> document.getElementById("mBody").innerHTML = "Invalid Username or Password"; </script>
        ';
    }

    

?>