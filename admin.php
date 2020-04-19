<?php
    if (isset($_GET['code'])) {
        # code...
        if ($_GET['code'] === 'myadmin') {
            # code...
            echo '<p style="color: Green;">Correct combination... redirecting...</p>';
            sleep(4);
            header("location: mylogin.php");
        }else{
            echo '<p style="color: red;">incorrect combination... redirecting...</p>';
            sleep(4);
            header("location: forbidden.html");
        }
    }else{
        header("location: forbidden.html");
    }
?>
<style>
    <body>
        background: black;
    </body>
</style>