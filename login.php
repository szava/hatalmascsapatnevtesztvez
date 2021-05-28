<html>
    <header>
        <title>Bejelentkezés</title>
        <link rel="stylesheet" href="style.css">
    </header>
    <body>
        <div class="center">
            <h1>Bejelentkezés</h1>
            <form action="includes/login-inc.php" method="post">

                <div class="txt_field">
                    <input type="text" name="name" placeholder="Felhasználó név/Email">
                </div>

                <div class="txt_field">
                    <input type="password" name="password" placeholder="Jelszó">
                </div>

                <div class="button">
                    <button type="submit" name="submit">Bejelentkezés</button>
                </div>

                <div class="signup_link">
                    <a href="register.php">Regisztráció</a>
                </div>
                
            </form>
        </div>
    </body>
</html>

<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Ne hagyj üresen mezőt!</p>";
        }
        else if($_GET["error"] == "wronglogin"){
            echo "<p>Hibás felhasználó név és/vagy jelszó!</p>";
        }
    }
?>
