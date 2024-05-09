<?php
// Kết nối đến cơ sở dữ liệu
require '../new/db/connect.php';

// Kiểm tra xem có dữ liệu tìm kiếm được gửi từ biểu mẫu không
if(isset($_GET['search_query'])) {
    // Lấy dữ liệu tìm kiếm và làm sạch
    $searchQuery = mysqli_real_escape_string($connect, $_GET['search_query']);

    // Truy vấn SQL để tìm kiếm hóa đơn dựa trên dữ liệu tìm kiếm
    $sql = "SELECT * FROM `Bills` WHERE `AccountNumber` LIKE '%$searchQuery%' OR `BillID` LIKE '%$searchQuery%' OR `Amount` LIKE '%$searchQuery%' OR `Service` LIKE '%$searchQuery%' OR `Category` LIKE '%$searchQuery%' OR `PaymentStatus` LIKE '%$searchQuery%' OR `Comment` LIKE '%$searchQuery%'";
    $result = $connect->query($sql);

    // Hiển thị kết quả tìm kiếm
    if ($result->num_rows > 0) {
        // Hiển thị kết quả tìm kiếm
        while ($row = $result->fetch_assoc()) {
            // Hiển thị thông tin của hóa đơn
        }
    } else {
        // Hiển thị thông báo khi không tìm thấy kết quả
        echo "No results found.";
    }
}
?>
