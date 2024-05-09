<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4 fs-4">Manage Bills</h2>
    <div>
    <h3 class="mb-2 fs-5 fw-normal">Archive Bills</h3>
    </div>


    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="input-group">
            <span class="input-group-text">&#128269;</span>
            <input type="text" class="form-control" id="searchInput" placeholder="Search...">
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
                echo "<tr>";
                // Thêm checkbox vào cột "Mark"
                echo "<td class='center-checkbox'><input type='checkbox'></td>";
                // Hiển thị dữ liệu từ cơ sở dữ liệu vào các cột khác
                echo "<td>" . $row['AccountNumber'] . "</td>";
                echo "<td>" . $row['BillID'] . "</td>";
                echo "<td>" . $row['Amount'] . "</td>";
                echo "<td>" . $row['Service'] . "</td>";
                echo "<td>" . $row['Category'] . "</td>";
                echo "<td>" . $row['PaymentStatus'] . "</td>";
                echo "<td>" . $row['Comment'] . "</td>";
                
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
