<?php
    if (isset($_GET['code'])) {
        # code...
        if ($_GET['code'] === 'myadmin') {
            # code...
            $result = '<p style="color: limegreen;">Correct combination... redirecting...</p><title>redirecting...</title></p>';
            header("location: mylogin.php?orig=".md5('php'));
        }else{
            $result = '<p style="color: red;">incorrect combination... redirecting...</p><title>redirecting...</title>';
            sleep(3000);
            header("location: forbidden.html");
        }
    }else{
        header("location: forbidden.html");
    }
?>
<html>
    <head>
        <style>
            body {
                background: black;
            }
        </style>
    </head>
    <body>
        <?php echo $result;?>
    </body>
</html>