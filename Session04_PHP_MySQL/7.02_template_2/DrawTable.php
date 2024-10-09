<?php
    include 'templates/Head.php';
    include 'templates/Left.php';
?>

<div id="center">
  <table>
    <?php
        // Số hàng và số cột cần thiết
        $rows = 4;
        $cols = 9;

        for ($i = 1; $i <= $rows; $i++) {
            echo "<tr>"; 
            if ($i % 2 != 0) {
                for ($j = 1; $j <= $cols; $j++) {
                    echo "<td>" . $j . "</td>";
                }
            } 
            else {
                for ($j = $cols; $j >= 1; $j--) {
                    echo "<td>" . $j . "</td>";
                }
            }
            echo "</tr>"; 
        }
    ?>
  </table>
</div>

<?php
    include 'templates/Footer.php';
?>