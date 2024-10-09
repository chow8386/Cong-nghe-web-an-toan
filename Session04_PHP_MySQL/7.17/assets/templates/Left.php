<?php
    include 'libs/db_conn.php'; 

    $ads = [];
    $sql = "SELECT * FROM ads WHERE status = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ads[] = [
                'ad_id' => $row['ad_id'],
                'url' => $row['url'],
                'image' => $row['image'],
                'status' => $row['status']
            ];
        }
    }

    include 'libs/db_close.php'; 
?>

<!-- Sidebar -->
<div class="sidebar">
    <h3>DANH MỤC LAPTOP</h3>
    <ul>
        <?php 
            foreach ($categories as $row) {
                echo "<li><a href='?page=productList&category_id=" . $row['category_id'] . "'>". $row['name'] . "</a></li>";
            }
        ?>
        <!-- More categories here -->
    </ul>

    <!-- Advertisement section -->
    <div class="ads-section">
        <div class="slideshow-container">
            <?php 
                if (!empty($ads)) {
                    foreach ($ads as $ad) {
                        if ($ad['status'] == 1) {  
                            echo "<div class='mySlides fade'>";
                            echo "<a href='". htmlspecialchars($ad['url']) . "' target='_blank'>";
                            echo "<img src='" . $ad['image'] . "' style='width:100%'>";
                            echo "</a>";
                            echo "</div>";
                        }
                    }
                }
            ?>
        </div>
    </div>
</div>
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let slides = document.getElementsByClassName("mySlides");
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1; }
        slides[slideIndex - 1].style.display = "block";  
        setTimeout(showSlides, 3000);
    }
</script>
