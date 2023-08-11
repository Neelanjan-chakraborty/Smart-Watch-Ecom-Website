<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    /* Common styles for header */
    header {
      display: flex;
      align-items: center;
      padding: 1px;
      gap: 5px;
      background: linear-gradient(90deg, #00ffc452, #f8bd0063) !important;
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      flex-wrap: wrap;
      align-content: space-between;
      justify-content: space-around;
    }

    .logo {
      text-decoration: none;
      color: #F8BD00;
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
      gap: 250px;
      border-radius: 10px;
      padding: 10px 15px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

.user-card {
    background: linear-gradient(90deg, #00ffc4, #f8bd00b8) !important;
    backdrop-filter: blur(10px) !important;
    border-radius: 10px !important;
    padding: 10px 15px !important;
    display: flex !important;
    flex-wrap: wrap;
    justify-content: space-evenly;
    margin-bottom: 15px;
}

    .user-card a {
      color: white;
      text-decoration: none;
      margin-right: 10px;
      transition: color 0.3s;
    }

    .user-card a:hover {
      color: black;
    }

.search-bar {
    background: linear-gradient(90deg, #00ffe7, #ffc200a8) !important;
    backdrop-filter: blur(10px) !important;
    border-radius: 10px !important;
    padding: 5px 10px !important;
    display: flex !important;
    align-items: center !important;
}

    .search-input {
      border: none;
      background: none;
      padding: 5px;
      width: 200px;
    }

    /* Mobile-specific styles */
    @media (max-width: 768px) {
      header {
        flex-direction: column;
        align-items: flex-start;
      }

      .nav-bar {
        margin-top: 10px;
      }

      .user-card {
        display: none;
      }

      .search-bar {
        width: 100%;
        margin-top: 10px;
      }

      .search-input {
        width: 100%;
      }
    }

    /* Desktop-specific styles */
    @media (min-width: 769px) {
      header {
        position: sticky;
        top: 0;
        z-index: 100;
      }
    }
    .about-dev-btn {
    color: #333;
    text-decoration: none;
    padding: 0px 7px;
    background-color: #f2f2f257;
    border: 1px solid #000;
    border-radius: 4px;
    margin-left: 0px;
    font-weight: bold;
}

.about-dev-btn:hover {
    background-color: #ddd; /* Button background color on hover */
}
  </style>
</head>
<body>
  <header>
    <a href="index.php" class="logo">
      <img src="res/logo.png" alt="Logo" width="80" height="80">
      WatchKart
    </a>
    <div class="user-card">
      <?php
      if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        echo '<a href="login.html"><span class="icons"><i class="fas fa-sign-in-alt"></i></span> Log In</a>';
      } else {
        echo '<a href="user.php"><span class="icons"><i class="fas fa-user"></i></span> ' . $_SESSION["first_name"] . ' ' . $_SESSION["last_name"] . '</a>';
        echo '<a href="logout.php"><span class="icons"><i class="fas fa-door-open"></i></span> Log Out</a>';
            // Adding "About the Developer" button with icon
        echo '<a href="https://www.neelanjanchakraborty.tech/" class="about-dev-btn"><span class="icons"><i class="fas fa-info-circle"></i></span> About the Developer</a>';
      }
      ?>
      <a href="cart.php"><span class="icons"><i class="fas fa-shopping-cart"></i></span> Cart</a>
    </div>
    <div class="search-bar">
      <input type="text" class="search-input" placeholder="Search products...">
    </div>
  </header>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector(".search-input");
    const productCards = document.querySelectorAll(".product-card");
    const heroSection = document.querySelector("#hero-banner");
    const sem = document.querySelector(".full-width-image");

    searchInput.addEventListener("input", function () {
        const searchTerm = searchInput.value.toLowerCase();
        
        // Hide hero section and category image
        heroSection.style.display = "none";
        sem.style.display = "none";

        productCards.forEach(function (card) {
            const productTitle = card.querySelector(".product-title").textContent.toLowerCase();
            if (productTitle.includes(searchTerm))
             {
                card.style.display = "block";
                sem.style.display = "none";

            } 
            else 
            {
                card.style.display = "none";
            }
        });
    });
});

</script>
</body>

</html>
