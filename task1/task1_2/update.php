<?php
// Kết nối đến cơ sở dữ liệu
require '../new/db/connect.php';

// Kiểm tra xem dữ liệu đã được gửi từ biểu mẫu chỉnh sửa hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có ID của hóa đơn và dữ liệu được gửi từ biểu mẫu hay không
    if(isset($_POST['id']) && isset($_POST['account_number']) && isset($_POST['bill_id']) && isset($_POST['amount']) && isset($_POST['service']) && isset($_POST['category']) && isset($_POST['payment_status']) && isset($_POST['comment'])) {
        // Lấy ID của hóa đơn từ dữ liệu được gửi và làm sạch dữ liệu
        $id = mysqli_real_escape_string($connect, $_POST['id']);

        // Lấy các trường dữ liệu được gửi từ biểu mẫu và làm sạch dữ liệu
        $account_number = mysqli_real_escape_string($connect, $_POST['account_number']);
        $bill_id = mysqli_real_escape_string($connect, $_POST['bill_id']);
        $amount = mysqli_real_escape_string($connect, $_POST['amount']);
        $service = mysqli_real_escape_string($connect, $_POST['service']);
        $category = mysqli_real_escape_string($connect, $_POST['category']);
        $payment_status = mysqli_real_escape_string($connect, $_POST['payment_status']);
        $comment = mysqli_real_escape_string($connect, $_POST['comment']);

        // Truy vấn SQL để cập nhật thông tin của hóa đơn trong cơ sở dữ liệu
        $sql = "UPDATE `Bills` SET `AccountNumber` = '$account_number', `BillID` = '$bill_id', `Amount` = '$amount', `Service` = '$service', `Category` = '$category', `PaymentStatus` = '$payment_status', `Comment` = '$comment' WHERE `ID` = $id";

        if ($connect->query($sql) === TRUE) {
            // Chuyển hướng trở lại trang quản lý hóa đơn sau khi cập nhật thành công
            header('Location: index.php?page_layout=bills');
            exit(); // Kết thúc script sau khi chuyển hướng
        } else {
            // Hiển thị thông báo lỗi nếu xảy ra vấn đề với truy vấn SQL
            echo "Error updating record: " . $connect->error;
        }
    } else {
        // Hiển thị thông báo nếu không có đủ dữ liệu được gửi từ biểu mẫu
        echo "Missing data.";
    }
} else {
    // Hiển thị thông báo nếu yêu cầu không phải là POST
    echo "Invalid request method.";
}

// Đóng kết nối
$connect->close();
?>
