<?php
include 'connect.php';
include 'header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="./styles/index.css">
</head>
<body>
<div class="slider-container">
  <div class="slider" id="slider">
    <!-- Slide 1 -->
    <div class="slide">
      <img src="./apartment_image/a1.jpg" alt="Slide 1">
      <div class="overlay-text">Welcome to our apartment</div>
    </div>
    <!-- Slide 2 -->
    <div class="slide">
      <img src="./apartment_image/a2.jpg" alt="Slide 2">
      <div class="overlay-text">Experience comfort and luxury</div>
    </div>
    <!-- Slide 3 -->
    <div class="slide">
      <img src="./apartment_image/a3.jpg" alt="Slide 3">
      <div class="overlay-text">Book your stay now</div>
    </div>
  </div>

  <!-- Navigation buttons -->
  <div class="slider-nav">
    <button onclick="prevSlide()">&#10094;</button>
    <button onclick="nextSlide()">&#10095;</button>
  </div>
</div>

<section>

    <h2 style="text-align: center; margin: 50px auto;">Latest Apartments</h2>
    <?php
    $sql = "SELECT * FROM apartment WHERE available = 1 LIMIT 3"; // Limit the query to retrieve only the first three apartments
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $count = 0;
        echo "<div class='container'>"; 
        while ($row = $result->fetch_assoc()) {
            if ($count % 3 == 0 && $count > 0) {
                echo "</div><div class='container'>";
            }
            echo "<div class='apartment-card'>";
            echo "<img src='" . $row["image"] . "' class='apartment-image'>";
            echo "<div class='apartment-detail'>";
            echo "<p class='apartment-title'>" . $row["name"] . "</p>";
            echo "<p class='apartment-description'>Address: " . $row["address"] . "</p>";
            echo "<p class='apartment-description'>City: " . $row["city"] . "</p>";
            echo "<p class='apartment-price'>Price: $" . $row["price"] . "</p>";
            echo "<div class='view-btn'>";
            echo "<a href='view_apartment.php?id=" . $row["id"] . "'><button style='background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;'>View</button></a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            $count++;
        }
        echo "</div>"; // End container
    } else {
        echo "<p>No available apartments.</p>";
    }
?>
<script>
  let currentSlide = 0;
  const slider = document.getElementById('slider');
  const totalSlides = document.querySelectorAll('.slider .slide').length;

  function showSlide(index) {
    if (index < 0) {
      currentSlide = totalSlides - 1;
    } else if (index >= totalSlides) {
      currentSlide = 0;
    } else {
      currentSlide = index;
    }

    // Move the slider container to show the current slide
    slider.style.transform = `translateX(-${currentSlide * 100}%)`;
  }

  function nextSlide() {
    showSlide(currentSlide + 1);
  }

  function prevSlide() {
    showSlide(currentSlide - 1);
  }

  // Auto slide every 5 seconds
  setInterval(nextSlide, 5000);

  // Initialize with the first slide
  showSlide(currentSlide);
</script>

<?php
include 'footer.php';?>

</body>
</html>
