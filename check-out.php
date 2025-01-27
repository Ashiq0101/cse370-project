<?php
$active = "Checkout";
include('db.php');
include("functions.php");
include("header.php");
?>

<!-- Breadcrumb Section Begin navigate back to "Home" or "Shop" easily. -->
<div class="breacrumb-section" style="background-color:rgb(212, 227, 242); padding: 15px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more text-center" style="color: #007bff; font-size: 18px; font-weight: bold;">
                    <a href="index.php" style="color: #007bff; text-decoration: none;"><i class="fa fa-home"></i> Home</a>
                    <span style="color: #6c757d;"> / Shop / Check Out</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad" style="background-color:rgb(227, 178, 178); padding: 50px 0;">
    <div class="container">
        <form class="checkout-form">
            <div class="row">
                <!-- Order Summary -->
                <div class="col-lg-6 offset-lg-3">
                    <div class="place-order bg-white p-4 rounded shadow-sm">
                        <div class="checkout-content mb-4 text-center">
                            <a href="shop.php" class="btn btn-secondary" style="background-color: #6c757d; border: none; color: white; padding: 10px 20px;">Continue Shopping</a>
                        </div>
                        <h4 class="mb-4" style="color: #007bff;">Your Order</h4>
                        <div class="order-total">
                            <ul class="order-table" style="list-style: none; padding: 0;">
                                <li style="font-weight: bold; display: flex; justify-content: space-between; border-bottom: 2px solid #e9ecef; padding-bottom: 10px; margin-bottom: 10px;">
                                    <span>Products</span>
                                    <span>Total</span>
                                </li>
                                <?php checkoutProds(); ?>
                                <li class="fw-normal" style="display: flex; justify-content: space-between; margin-top: 10px;">
                                    <span>Subtotal</span>
                                    <span><?php echo total_price(); ?></span>
                                </li>
                                <li class="total-price" style="display: flex; justify-content: space-between; font-weight: bold; color: #dc3545; margin-top: 10px; border-top: 2px solid #e9ecef; padding-top: 10px;">
                                    <span>Total BDT 0</span>
                                    <span><?php echo total_price(); ?></span>
                                </li>
                            </ul>
                            <div class="order-btn mt-4 text-center">
                                <a href="check-out.php?place=1" class="btn btn-primary w-100" style="padding: 12px; background-color: #007bff; border: none;">Place Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Shopping Cart Section End -->

<?php
include('footer.php');
?>

</body>

</html>

<?php
if (isset($_GET['place'])) {
    $c_id = $_SESSION['customer_email']; #Retrieves the logged in customer's ID using their email stored in 
    $query = "SELECT * FROM customer WHERE customer_email = '$c_id'";
    $run_query = mysqli_query($con, $query);
    $get_query = mysqli_fetch_array($run_query);
    $custom_id = $get_query['customer_id'];

    $get_items = "SELECT * FROM cart WHERE c_id = '$c_id'";
    $run_items = mysqli_query($db, $get_items);

    $total_q = 0;
    $final_price = 0;

    while ($row_items = mysqli_fetch_array($run_items)) {
        $p_id = $row_items['products_id']; #the cart table for all items added by the customer.
        $pro_qty = $row_items['qty'];

        $get_item = "SELECT * FROM products WHERE products_id = '$p_id'";
        $run_item = mysqli_query($db, $get_item);

        while ($row_item = mysqli_fetch_array($run_item)) {
            $pro_price = $row_item['product_price']; #Calculates the total number of items and total cost
            $total_q += $pro_qty;
            $pro_total_p = $pro_price * $pro_qty;
            $final_price += $pro_total_p;
        }
    }

    $order = "INSERT INTO orders (order_qty, order_price, c_id, date) VALUES ('$total_q', '$final_price', '$custom_id', NOW())";
    $run_order = mysqli_query($con, $order);

    $cart_clear = "DELETE FROM cart WHERE c_id = '$c_id'";
    $run_clear = mysqli_query($con, $cart_clear);

    echo "<script>alert('Order Placed. Thank you for Shopping!');</script>"; #Displays
    echo "<script>window.open('account.php?orders','_self');</script>";
}
?>
