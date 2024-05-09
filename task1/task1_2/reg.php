<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Bills</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
      <?php

        require '../new/db/connect.php';

        if (isset($_POST['btn-reg'])) {
            $AccountNumber = $_POST['AccountNumber'];
            $BillID = $_POST['BillID'];
            $Amount = $_POST['Amount'];
            $Service = $_POST['Service'];
            $Category = $_POST['Category'];
            $PaymentStatus = $_POST['PaymentStatus'];
            $Comment = $_POST['Comment'];

            if (!empty($AccountNumber) && !empty($BillID) && !empty($Amount) && !empty($Service) && !empty($Category) && !empty($PaymentStatus)) {
                // Nếu tất cả các trường đều có dữ liệu
                echo "<pre>";
                print_r($_POST);

                $sql = "INSERT INTO `Bills` (`AccountNumber`, `BillID`, `Amount`, `Service`, `Category`, `PaymentStatus`, `Comment`)
                VALUES ('$AccountNumber', '$BillID', '$Amount', '$Service', '$Category', '$PaymentStatus', '$Comment')";

                if ($connect->query($sql) === TRUE) {
                    echo "Thành công!";
                } else {
                    echo "Lỗi: {$sql} " .$connect->error;
                }
            } else {
                // Nếu có trường nào đó không có dữ liệu
                echo "Điền thông tin đầy đủ!";
            }
        }

        ?>
       <!-- Bảng hiển thị dữ liệu từ cơ sở dữ liệu -->
        <h2 class="text-center mt-5">Bills Data</h2>
        <div class="table-responsive">
          <table class="table table-bordered mt-3">
            <thead>
              <tr>
                <th>Account Number</th>
                <th>Bill ID</th>
                <th>Amount</th>
                <th>Service</th>
                <th>Category</th>
                <th>Payment Status</th>
                <th>Comment</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Kết nối đến cơ sở dữ liệu
            //   require '../new/db/connect.php';

              // Truy vấn dữ liệu từ bảng "Bills"
              $sql = "SELECT * FROM `Bills`";
              $result = $connect->query($sql);

              if ($result->num_rows > 0) {
                  // Nếu có dữ liệu, hiển thị dữ liệu trong bảng
                  while($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>".$row['AccountNumber']."</td>";
                      echo "<td>".$row['BillID']."</td>";
                      echo "<td>".$row['Amount']."</td>";
                      echo "<td>".$row['Service']."</td>";
                      echo "<td>".$row['Category']."</td>";
                      echo "<td>".$row['PaymentStatus']."</td>";
                      echo "<td>".$row['Comment']."</td>";
                      echo "</tr>";
                  }
              } else {
                  // Nếu không có dữ liệu, hiển thị thông báo
                  echo "<tr><td colspan='7'>No data available</td></tr>";
              }
              // Đóng kết nối cơ sở dữ liệu
              $connect->close();
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
        
        <?php
        header("Location: index.php");
        exit;
        ?>