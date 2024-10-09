<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div>
        <?php 
          session_start();
          if (isset($_SESSION['username']) && (isset($_SESSION['password']))) 
          {
            echo "Username: " . $_SESSION['username'];
            echo "<br>";
            echo "Password: " . $_SESSION['password'];
          }
          else 
          {
            echo "<p class='error-message'>Vui lòng đăng nhập!</p>";
          }
        ?>
    </div>


