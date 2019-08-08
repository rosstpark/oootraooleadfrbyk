<?php
    $file_name = 'head.txt';

    if($_POST['action'] && $_POST['action'] == 'save') {
        $myfile = fopen( $file_name, "w") or die("Unable to open file!");

        $txt = $_POST['script_head'];

        fwrite($myfile, $txt);
        fclose($myfile);
    }
    $script_head = file_get_contents( $file_name );
?>
<html>
<head>
    <title>Change Header</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <form action="" method="POST">
            <p><textarea name="script_head" class="form-control" rows="15"><?php echo $script_head; ?></textarea></p>
            <input type="hidden" name="action" value="save"/>
            <input type="submit" value="Send" class="btn btn-md btn-primary" />
        </form>
    </div>
</body>
</html>