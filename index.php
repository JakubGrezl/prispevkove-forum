<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./styles/post-card.css">
    <link rel="stylesheet" href="./styles/navbar.css">
    <link rel="stylesheet" href="./styles/login.css">
</head>

<body>
    <?php
    include "script/connection.php";
    include "script/globalFunctions.php";
    ?>
    <header class="header">
        <div class="logo">
            <h1 class="logo-text">Příspěvkové fórum</h1>
        </div>
        <nav class="nav-menu">
            <ul class="nav-list">
                <button onclick="ShowDiv('login-popup', 'flex')" class="nav-item">Login</button>
                <button onclick="ShowDiv('register-popup', 'flex')" class="nav-item">Register</button>
            </ul>
        </nav>
    </header>

    <div class="card-wrapper">
        <?php
        $posts = mysqli_query($conn, "SELECT p.ID_post, p.title, p.date, u.username AS 'author', p.content, COUNT(c.id) AS num_comments FROM post AS p LEFT JOIN comment AS c ON p.ID_post = c.ID_post LEFT JOIN user AS u ON u.ID_user = p.ID_post GROUP BY p.ID_post, p.title;") or die(mysqli_error($conn));
        while ($post = mysqli_fetch_array($posts)) {
            echo "<form class='post-card' action='./pages/post.php' method='get'>";
            echo "<div class='post-card-content' onclick='clickable(" . $post["ID_post"] . ")'>";
            echo "<h1 class='post-title'>" . $post["title"] . "</h1>";
            echo "<p class='post-date'>" . $post["date"] . "</p>";
            echo "<p class='post-author'>" . ReturnAuthor($post) . "</p>";
            echo "<p class='post-comments-number'>" . $post["num_comments"] . "</p>";
            echo "<p class='post-content'>" . substr($post["content"], 0, 50) . "</p>";
            echo "<input type='hidden' name='post-id' value='" . $post["ID_post"] . "'>";
            echo "<input class='post-submit' type='submit' id='submit-btn-" . $post["ID_post"] . "'>";
            echo "</div></form>";
        }
        ?>
    </div>

    <!--login popup-->
    <div id="login-popup" >
        <div class="login-content">
            <h2 class="login-title">Login</h2>
            <form class="login-form" action='./pages/login.php' method="post">
                <label for="email" class="login-label">Email:</label>
                <input type="text" id="email" class="login-input" required>

                <label for="password" class="login-label">Password:</label>
                <input type="password" id="login-password" class="login-input" required>

                <button type="submit" class="login-submit">Submit</button>
            </form>
            <button onclick="HideDiv('login-popup')" class="login-close">&times;</button>
        </div>
    </div>

    <!--register popup-->
    <div id="register-popup">
        <div class="login-content">
            <h2 class="login-title">Register</h2>
            <form onsubmit="return isValid();" class="login-form" action='./script/register.php' method="post">
                <label for="name" class="login-label">Name:</label>
                <input type="text" name="name" class="login-input" required>

                <label for="surname" class="login-label">Surname:</label>
                <input type="text" name="surname" class="login-input" required>    
            
                <label for="username" class="login-label">Username:</label>
                <input type="text" name="username" class="login-input" id="login-username-input" required oninput="checkUsername();">
                <span id="login-username-error" style="display: none">Username taken</span>

                <label for="password" class="login-label">Password:</label>
                <input type="password" name="password" class="login-input" id="password" required oninput="isPasswordEmpty();">
                
                
                <div id="password-check-wrapper" style="display: none">
                    <label for="password_check" class="login-label">Password check:</label>
                    <input type="password" name="password_check" class="login-input" id="password-check" required onblur="checkPassword();">
                    <span id="login-password-error" style="display: none">Not same password</span>
                </div>
                
                <label for="email" class="login-label">Email:</label>
                <input type="text" name="email" class="login-input" id="email-input" required onblur="checkEmail()">
                <span id="login-email-error" style="display: none">Wrong email</span>
                

                <label for="question" class="login-label">Kontrolní otázka:</label>
                <input type="text" name="question" class="login-input" required>

                <label for="answer" class="login-label">Odpověď na ní:</label>
                <input type="text" name="answer" class="login-input" required>

                <label for="note" class="login-label">Poznámka:</label>
                <input type="text" name="note" class="login-input">

                <input type="submit" class="login-submit" value="Submit">
            </form>
            <button onclick="HideDiv('register-popup')" class="login-close">&times;</button>
        </div>
    </div>


    <script id="main-script">
        let validation;
        function checkUsername(){
            $.ajax({
                url: './script/checkUsername.php',
                type: 'POST',
                data: {
                    username: $('#login-username-input').val()
                },
                success: function(data){
                    if(data == 'taken'){
                        $('#login-username-error').css('display', 'block');
                        validation = false;
                    }else{
                        $('#login-username-error').css('display', 'none');
                        validation = true;
                    }
                }
            });
        }


        function checkEmail() {
            if (validateEmail($('#email-input').val())){
                $('#login-email-error').css('display', 'none');
                validation = true;
            } else {
                $('#login-email-error').css('display', 'block');
                validation = false;
            }
        }

        function isPasswordEmpty(){
            if ($("#password").val() == "") {
                $("#password-check-wrapper").css("display", "none");
            } else {
                $("#password-check-wrapper").css("display", "block");
            }
        }

        function checkPassword() {
            if ($("#password").val() != $("#password-check").val())
            {
                $('#login-password-error').css('display', 'block');
                validation = false;
            } else {
                $('#login-password-error').css('display', 'none');
                validation = true;
            }
        }

        function isValid() {
            checkUsername();
            checkEmail();
            checkPassword();
            return validation;
        }



        function clickable(idnum) {
            document.getElementById('submit-btn-' + idnum).click();
        }
    </script>
    <script src="./script/popup.js"></script>
</body>
</html> 