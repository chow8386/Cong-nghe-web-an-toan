<?php
    include 'templates/Head.php';
    include 'templates/Left.php';
?>

<div id="center">
  Thực hiện các công việc
  <ul>
    <li>Tính và in ra giai thừa của 10</li>
      <?php
        function factorial($n) {
            if ($n == 0 || $n == 1) {
                return 1;
            } else {
                return $n * factorial($n - 1);
            }
        }
        $factorial_of_10 = factorial(10);
        echo "Giai thừa của 10 là: " . $factorial_of_10;
    ?>
    <br><br>

    <li>Tính và in ra diện tích hình tròn có bán kính 10 và thể tích khối cầu cùng bán kính</li>
      <?php
        $radius = 10;
        $pi = pi(); // Sử dụng hằng số Pi có sẵn trong PHP

        $circle_area = $pi * pow($radius, 2);
        echo "Diện tích hình tròn với bán kính $radius là: " . $circle_area . "<br>";

        $sphere_volume = (4/3) * $pi * pow($radius, 3);
        echo "Thể tích khối cầu với bán kính $radius là: " . $sphere_volume;
      ?>
    <br><br>
    <li>Hiển thị dòng chữ "Hello" chuyển động</li>
    <div class="moving-text">
        <?php echo "Hello"; ?>
    </div>
  </ul>
</div>

<?php
    include 'templates/Footer.php';
?>