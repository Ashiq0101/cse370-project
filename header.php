<?php
require_once('config.php'); #Likely includes important settings or constants, 
                            #such as database credentials, site paths, or global variables.
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Bloom Threads.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloom Threads.</title>

    <!-- Google Fonts Used -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sofia" rel="stylesheet">

    <!-- Tab Icon -->
    <link rel="icon" href="img/icon.svg">

    <!-- Css Styles -->
    <link rel='stylesheet' href='css/bootstrap.min.css' type='text/css'>
    <link rel='stylesheet' href='css/font-awesome.min.css' type='text/css'>
    <link rel='stylesheet' href='css/themify-icons.css' type='text/css'>
    <link rel='stylesheet' href='css/elegant-icons.css' type='text/css'>
    <link rel='stylesheet' href='css/owl.carousel.min.css' type='text/css'>
    <link rel='stylesheet' href='css/slicknav.min.css' type='text/css'>
    <link rel='stylesheet' href='css/style.css' type='text/css'>

    <style>
        /* Custom styles for the search bar */
        body {
            background-color: #f5f5f5; /* Light ash background */
        }

        .search-bar {
            background-color: rgb(67, 63, 63); /* White for contrast */
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px 10px;
            display: flex;
            align-items: center;
            box-shadow: 0px 2px 5px rgba(158, 123, 123, 0.1);
        }

        .search-bar input[type="text"] {
            border: none;
            outline: none;
            flex: 1;
            font-size: 16px;
            padding: 10px;
            background-color: transparent;
            color: #333;
        }

        .search-bar button {
            background-color: rgb(140, 187, 234);
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 5px;
            transition: background-color 0.3s ease;
        }

        .search-bar button:hover {
            background-color: rgb(132, 165, 197);
        }
    </style>
</head>

<body>

    <!-- Page Pre Load Section -->
    <div id="preload">
        <div class="load">
        </div>
    </div>

    <!-- Header Section -->
    <header class="header-section">
        <!-- Top Bar -->
        <div class="header-top" id="top">
            <div class="container">
                <div class="f-right">
                    <ul class="nav-right">
                        <li class="user-icon">
                            <div class="login-panel">
                                <i class="fa fa-user" style="font-size:20px"></i>
                            </div>
                            <div class="login-hover">
                                <div class="insidelog">
                                    <?php if ($_SESSION['customer_email'] == 'unset') {
                                        echo "<a href='login.php' class='btn logbtn' style='width: 200px; height:40px'>Login</a>";
                                    } else {
                                        echo "<a href='logout.php' class='btn logbtn' style='width: 200px; height:40px'>Log Out</a>";
                                    } ?>
                                </div>
                                <?php if ($_SESSION['customer_email'] == 'unset') {
                                    echo "<div class='insidelog'>
                                    <span class='small'>or </span><a href='register.php' class='small'>Sign up Now</a>
                                </div>";
                                } ?>
                                <?php if (!($_SESSION['customer_email'] == 'unset')) {
                                    echo "
                                <div class='insidelog' style='border-top: solid 0.2px #e5e5e5;'>
                                    <a href='account.php?orders' class='btn btn-dark' style='color:white;margin:4px 0'>My Account</a>
                                </div>";
                                }
                                ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Middle Bar. Includes the website logo and a search bar for finding products. --> 
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-md-3 logo">
                        <a href="index.php">
                            <span>Bloom Threads.</span>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <form method="post">
                            <div class="search-bar">
                                <input type="text" name="search" placeholder="Search our Store" required>
                                <button type="submit" name="submit">
                                    <i class="ti-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3 text-right" style="visibility: <?php if ($_SESSION['customer_email'] == 'unset') {
                                                                                echo "hidden";
                                                                            } ?>">
                        <ul class="nav-right"> <!--Displays the cart icon and the number of items in the user's shopping cart.-->
                            <li class="cart-icon">
                                <a href="shopping-cart.php">
                

                                    <i class="icon_bag_alt"></i> 
                                    <span><?php items(); ?></span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <?php cart_icon_prod(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>৳<?php total_price(); ?></h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="shopping-cart.php" class="primary-btn view-card">VIEW ALL ITEMS</a>
                                        <a href="check-out.php" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">৳<?php total_price(); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lower Bar Displays the main navigation menu, including links to "Home," "Shop," and "Contact."
 -->
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All Categories</span>
                        <ul class="depart-hover">
                            <?php getProdCat(); ?>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="<?php if ($active == 'Home') echo "active" ?>"><a href="index.php">Home</a></li>
                        <li class="<?php if ($active == 'Shop') echo "active" ?>"><a href="shop.php">Shop</a></li>
                        <li class="<?php if ($active == 'Contact') echo "active" ?>"><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <?php
    if (isset($_GET['delcart'])) { #Deletes an item from the cart using the products_id
        $p_id = $_GET['delcart'];
        $query = "DELETE FROM cart WHERE products_id='$p_id'";
        $run_query = mysqli_query($con, $query);
        echo "<script>window.open('index.php','_self')</script>";
    }

    if (isset($_POST['submit'])) {
        $item = $_POST["search"];
        $get_product = "SELECT * FROM products WHERE product_title LIKE '%$item%' LIMIT 0,1";
        $run_product = mysqli_query($con, $get_product);
        $count = mysqli_num_rows($run_product);

        if ($count > 0) {
            $row_product = mysqli_fetch_array($run_product);
            $products_id = $row_product['products_id'];
            echo "<script>window.open('product.php?product_id=$products_id','_self')</script>";
        } else {
            echo "
            <script>
                    bootbox.alert({
                        message: 'No product found',
                        backdrop: true
                    });
            </script>";
        }
    }
    ?>
</body>

</html>
