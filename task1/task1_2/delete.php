<?php
// Kết nối đến cơ sở dữ liệu
require '../new/db/connect.php';

if(isset($_GET['id'])) {
    // Lấy ID của hóa đơn cần xóa từ dữ liệu được gửi qua Ajax và làm sạch dữ liệu
    $id = mysqli_real_escape_string($connect, $_GET['id']);

    echo $id;


    // Xóa hóa đơn từ cơ sở dữ liệu
    $sql = "DELETE FROM `Bills` WHERE `ID` = $id";

    if ($connect->query($sql) === TRUE) {
        // Chuyển hướng trở lại trang quản lý hóa đơn sau khi xóa thành công
        header('Location: index.php?page_layout=bills');
        exit(); // Kết thúc script sau khi chuyển hướng
    } else {
        // Hiển thị thông báo lỗi nếu xảy ra vấn đề với truy vấn SQL
        echo "Error: " . $connect->error;
    }
} else {
    // Hiển thị thông báo nếu không có ID được cung cấp
    echo "No ID provided";
}

// Đóng kết nối
$connect->close();
?>
