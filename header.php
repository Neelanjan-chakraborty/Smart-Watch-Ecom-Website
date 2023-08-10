        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
            backdrop-filter: blur(10px);
        }
        .logo {
            text-decoration: none;
            color: #2874f0; /* Flipkart's blue color */
            font-weight: bold;
            font-size: 24px;
            display: flex;
            align-items: center;
        }
        .logo img {
            margin-right: 10px;
        }
        .icons {
            margin-right: 5px;
        }
.nav-bar {
    background: linear-gradient(90deg, #9bf1fd00, #ffc10700);
    backdrop-filter: blur(10px);
    padding: 10px 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.user-card {
    background: linear-gradient(45deg, #17a2b885, #ffc10782);
    backdrop-filter: blur(10px);
    border-radius: 10px;
    padding: 10px 15px;
    display: flex;
    align-items: flex-end;
}
        .user-card a {
            color: white;
            text-decoration: none;
            margin-right: 10px;
            transition: color 0.3s;
        }
        .user-card a:hover {
            color: #f1c40f;
        }
    </style>
    <header>
        <div class="nav-bar">
        <a href="index.php" class="logo">
            <img src="res/logo.png" alt="Logo" width="80" height="80">
            WatchKart
        </a>
        <div class="user-card">
            <?php
            if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                echo '<a href="login.html"><span class="icons"><i class="fas fa-sign-in-alt"></i></span> Log In</a>';
            } else {
                echo '<a href="user.php"><span class="icons"><i class="fas fa-user"></i></span> '. $_SESSION["first_name"] .' ' . $_SESSION["last_name"].'</a>';
                echo '<a href="logout.php"><span class="icons"><i class="fas fa-door-open"></i></span> Log Out</a>';
            }
            ?>
            <a href="cart.php"><span class="icons"><i class="fas fa-shopping-cart"></i></span> Cart</a>
        </div>
        </div>

    </header>