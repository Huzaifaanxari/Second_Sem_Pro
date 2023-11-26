<?php
include 'conn.php';
$getid = $_GET['id'];
$query = "SELECT * FROM `admin` WHERE Ad_ID = $getid ;";
$data = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
  extract($_POST);
  $update_query = "UPDATE `admin` SET `Ad_Username`='$admin_username',`Ad_gmail`='$admin_gmail',`Ad_contact_number`='$admin_contact',`Ad_Address`='$admin_address' WHERE $getid";
  if ($conn->query($update_query) === TRUE) {
    echo "record Update created successfully";
    header("Location: index.php");
  } else {
    echo "Error: " . $update_query . "<br>" . $conn->error;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>

  <!-- Mes styles-->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" referrerpolicy="no-referrer" />

</head>

<body>

  <!-- My Side Barre -->
  <div class="sideBarre">
    <div class="sideBarre__logo">
      <div class="sideBarre__cercle">

      </div>
      <h1>Admin</h1>
    </div>
    <div class="sideBarre__menu">
      <ul>
        <li><a href="index.php">Profile</a></li>
        <li><a href="products.php">Product</a></li>
        <li><a href="employees.php">Employees</a></li>
        <li><a href="orders.php">Order</a></li>
        <li><a href="feedback.php">Feedback</a></li>
        <li><a href="faq.php">FAQ</a></li>
      </ul>
    </div>
  </div>

  <!-- My Main Content -->
  <div class="mainContent">
    <nav>

      <div class="user">
        Helo Sir
      </div>

    </nav>

    <!-- My Box Content -->
    <div class="boxContent">

      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Update Profile</h1>

      <form action="#" method="post">
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">User Name</label>
          <input type="text" id="name" name="admin_username" class="border-2 border-gray-300 p-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" value="<?php echo $row['Ad_Username']; ?>" required>
        </div>
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" id="email" name="admin_gmail" class="border-2 border-gray-300 p-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" value="<?php echo $row['Ad_gmail']; ?>" required>
        </div>
        <div class="mb-4">
          <label for="contact" class="block text-sm font-medium text-gray-700">Contact</label>
          <input type="text" id="contact" name="admin_contact" class="border-2 border-gray-300 p-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" value="<?php echo $row['Ad_contact_number']; ?>" required>
        </div>
        <div class="mb-4">
          <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
          <input type="address" id="address" name="admin_address" class="border-2 border-gray-300 p-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" value="<?php echo $row['Ad_Address']; ?>" required>
        </div>

        <button type="submit" class="bg-indigo-500 text-white p-2 rounded-lg font-semibold w-full hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100" name="update">Update</button>
      </form>



    </div>
  </div>

</body>

</html>