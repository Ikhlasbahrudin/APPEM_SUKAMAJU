<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: home.php");
    exit(); // Pastikan untuk keluar setelah melakukan redirect
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper user-wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if($sql && mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
          <?php 
            } else {
              // Handle ketika query tidak menghasilkan data
              echo "Data tidak ditemukan";
            }
          ?>
        </div>
        <?php 
          if(isset($row)) {
            echo '<a href="php/logout.php?logout_id=' . $row['unique_id'] . '" class="logout">Logout</a>';
          }
        ?>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
