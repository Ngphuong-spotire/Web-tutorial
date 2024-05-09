<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Edit Bill</h2>

    <?php
    // Kết nối đến cơ sở dữ liệu
    require '../new/db/connect.php';

    // Kiểm tra xem ID của hóa đơn cần chỉnh sửa đã được gửi qua URL hay không
    if(isset($_GET['id'])) {
        // Lấy ID của hóa đơn cần chỉnh sửa từ URL và làm sạch dữ liệu
        $id = mysqli_real_escape_string($connect, $_GET['id']);

        // Truy vấn dữ liệu của hóa đơn từ cơ sở dữ liệu
        $sql = "SELECT * FROM `Bills` WHERE `ID` = $id";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            // Lấy dữ liệu của hóa đơn từ kết quả truy vấn
            $bill = $result->fetch_assoc();
            ?>

            <!-- Form chỉnh sửa -->
            <form method="post" action="update.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="mb-3">
                    <label for="account_number" class="form-label">Account Number</label>
                    <input type="text" class="form-control" id="account_number" name="account_number" value="<?php echo $bill['AccountNumber']; ?>">
                </div>
                <div class="mb-3">
                    <label for="bill_id" class="form-label">Bill ID</label>
                    <input type="text" class="form-control" id="bill_id" name="bill_id" value="<?php echo $bill['BillID']; ?>">
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="<?php echo $bill['Amount']; ?>">
                </div>
                <div class="mb-3">
                    <label for="service" class="form-label">Service</label>
                    <input type="text" class="form-control" id="service" name="service" value="<?php echo $bill['Service']; ?>">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" name="category" value="<?php echo $bill['Category']; ?>">
                </div>
                <div class="mb-3">
                    <label for="payment_status" class="form-label">Payment Status</label>
                    <input type="text" class="form-control" id="payment_status" name="payment_status" value="<?php echo $bill['PaymentStatus']; ?>">
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <input type="text" class="form-control" id="comment" name="comment" value="<?php echo $bill['Comment']; ?>">
                </div>
                <!-- Các trường thông tin khác của hóa đơn -->
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

            
            <?php
        } else {
            echo "<p>No bill found with this ID.</p>";
        }
    } else {
        echo "<p>No ID provided.</p>";
    }

    // Đóng kết nối
    $connect->close();
    ?>

</div>

</body>
</html>
