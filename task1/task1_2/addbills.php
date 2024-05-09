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
      <div class="col-md-6">
        <h1 class="text-center">Add New Bills</h1>
        <form id="addBillForm" class="bg-light p-4 my-3" action="reg.php" method="post" onsubmit="return validateForm()">
          <div class="form-group">
            <label for="AccountNumber" class="required">Account Number<span class="red">*</span></label>
            <input type="text" class="form-control" id="AccountNumber" name="AccountNumber" required>
          </div>

          <div class="form-group">
            <label for="BillID" class="required">Bill ID<span class="red">*</span></label>
            <input type="text" class="form-control" id="BillID" name="BillID" required>
          </div>

          <div class="form-group">
            <label for="Amount" class="required">Amount<span class="red">*</span></label>
            <input type="text" class="form-control" id="Amount" name="Amount" required>
          </div>

          <div class="form-group">
            <label for="Service" class="required">Service<span class="red">*</span></label>
            <input type="text" class="form-control" id="Service" name="Service" required>
          </div>

          <div class="form-group">
            <label for="Category" class="required">Category<span class="red">*</span></label>
            <input type="text" class="form-control" id="Category" name="Category" required>
          </div>

          <div class="form-group">
            <label for="PaymentStatus" class="required">Payment Status<span class="red">*</span></label>
            <input type="text" class="form-control" id="PaymentStatus" name="PaymentStatus" required>
          </div>

          <div class="form-group">
            <label for="Comment">Comment</label>
            <textarea class="form-control" id="Comment" name="Comment" rows="5"></textarea>
          </div>

          <input type="submit" class="btn btn-primary btn-block" value="Save" name="btn-reg">
        </form>
        <div id="errorMessages" class="text-danger"></div>
      </div>
    </div>
  </div>
  
  <script>
    function validateForm() {
        var accountNumber = document.getElementById('AccountNumber').value;
        var billID = document.getElementById('BillID').value;
        var amount = document.getElementById('Amount').value;
        var service = document.getElementById('Service').value;
        var category = document.getElementById('Category').value;
        var paymentStatus = document.getElementById('PaymentStatus').value;

        var errorMessage = '';

        // Check if fields are empty
        if (!accountNumber || !billID || !amount || !service || !category || !paymentStatus) {
            errorMessage += 'All fields are required. ';
        }

        // Example validation: check if Amount is a valid number
        if (isNaN(amount)) {
            errorMessage += 'Amount must be a number. ';
        }

        // Display error message if any
        var errorMessagesElement = document.getElementById('errorMessages');
        errorMessagesElement.innerHTML = errorMessage;

        // Return false to prevent form submission if there are errors
        return errorMessage === '';
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
