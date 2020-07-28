<?php
    session_start();
    include 'traitement/php_admin.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">  
    <link rel="stylesheet" href="css/style.css">
    <title>Admin</title>
</head>
<body>
    <section>
        <table>

        </table>
    </section>
    <section>
        <table>

        </table>
    </section>
    <section>
        <form enctype="multipart/form-data" action="" method="POST">
            <section>
                <label for="image">Choix de l'image</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" id="image">        
                <input type="file" name="paires" accept=".jpg, .png, .jpeg"/>
            </section>            
            <input type="submit" name="valid_img" value="Envoyer">
        </form>
        <img src="<?php echo $testsuite[0] ?>" alt="">
    </section>
    <section>
        <table>

        </table>
    </section>
</body>
</html>