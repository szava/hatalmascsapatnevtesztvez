<html>
    <header>
        <title>Regisztráció</title>
        <link rel="stylesheet" href="style.css">
    </header>
    <body>
        <div class="center">
            <h1>Regisztráció</h1>
            <form action="includes/reg-inc.php" method="post">

                <div class="txt_field">
                    <input type="text" name="name" placeholder="Felhasználó név">
                </div>

                <div class="txt_field">
                    <input type="text" name="email" placeholder="Email">
                </div>

                <div class="txt_field">
                    <input type="password" name="password" placeholder="Jelszó">
                </div>

                <div class="txt_field">
                <input type="password" name="passwordagain" placeholder="Jelszó ismétlése">
                </div>

                <button type="submit" name="submit">Regisztráció</button>

                <div class="signup_link">
                    <a href="login.php">Bejelentkezés</a>
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
        else if($_GET["error"] == "invalidemail"){
            echo "<p>Válassz egy valós emailt!</p>";
        }
        else if($_GET["error"] == "passwordnotmatch"){
            echo "<p>Jelszavak nem egyeznek</p>";
        }
        else if($_GET["error"] == "stmtfailed"){
            echo "<p>Próbálkozz később!</p>";
        }
        else if($_GET["error"] == "usernametaken"){
            echo "<p>Ez a név már foglalt!</p>";
        }
        else if($_GET["error"] == "none"){
            echo "<p>Regisztráció sikeres</p>";
        }
    }
?>


