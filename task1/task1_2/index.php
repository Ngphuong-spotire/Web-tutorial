<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bills</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* CSS để căn giữa checkbox */
        .center-checkbox {
            text-align: center;
        }
    </style>

</head>
<body>

<div class="container">

    <h2 class="mb-4">Manage Bills</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." name="search_query" id="search_query">
            <button class="btn btn-outline-secondary" type="button" id="search_button">Search</button>
        </div>
    </div>


    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <a href="#" class="btn btn-primary me-2">Archive</a>
            <a href="addbills.php" class="btn btn-primary me-2">Add New Bill</a>
            <a href="archive.php" class="btn btn-primary me-2">View Archived Items</a>
        </div>
    </div>

    <div class="mb-3">
        <span>Show</span>
        <select id="showItemsDropdown" class="form-select">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
        </select>
        <span>items</span>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Mark</th>
            <th scope="col">Account Number</th>
            <th scope="col">Bill ID</th>
            <th scope="col">Amount</th>
            <th scope="col">Service</th>
            <th scope="col">Category</th>
            <th scope="col">Payment Status</th>
            <th scope="col">Comment</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Kết nối đến cơ sở dữ liệu
        require '../new/db/connect.php';

        // Truy vấn dữ liệu từ bảng "Bills"
        $sql = "SELECT * FROM `Bills`";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            // Nếu có dữ liệu, hiển thị dữ liệu trong bảng
            while ($row = $result->fetch_assoc()) {
                echo "<tr data-id='{$row['id']}'>"; // Thêm thuộc tính data-id vào thẻ tr
                // Thêm checkbox vào cột "Mark"
                echo "<td class='center-checkbox'><input type='checkbox'></td>";
                // Hiển thị dữ liệu từ cơ sở dữ liệu vào các cột khác
                echo "<td>" . $row['AccountNumber'] . "</td>";
                echo "<td>" . $row['BillID'] . "</td>";
                echo "<td>$" . $row['Amount'] . "</td>";
                echo "<td>" . $row['Service'] . "</td>";
                echo "<td>" . $row['Category'] . "</td>";
                echo "<td>" . $row['PaymentStatus'] . "</td>";
                echo "<td>" . $row['Comment'] . "</td>";
                // Thêm liên kết "Edit/Delete"
                echo "<td><a href='edit.php?id={$row['id']}' class='edit-btn' data-id='{$row['id']}'>Edit</a> | <a href='delete.php?id={$row['id']}' class='delete-btn' data-id='{$row['id']}'>Delete</a></td>";

                echo "</tr>";
            }
        } else {
            // Nếu không có dữ liệu, hiển thị thông báo
            echo "<tr><td colspan='9'>No data available</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#">&laquo; Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next &raquo;</a>
            </li>
        </ul>
    </nav>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Xử lý sự kiện click trên nút "Delete"
    $('.delete-btn').click(function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

        // Xác định ID của hóa đơn cần xóa
        var billID = $(this).data('id');

        // Gửi yêu cầu xóa hóa đơn bằng Ajax
        $.ajax({
            type: 'POST',
            url: 'delete.php',
            data: { id: billID },
            // echo "mot"
            success: function(response) {
                // Nếu xóa thành công, xóa hàng khỏi bảng ngay lập tức
                if(response === "success") {
                    $('tr[data-id="' + billID + '"]').remove();
                } else {
                    alert('Error deleting bill.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
</script>

</body>
</html>
