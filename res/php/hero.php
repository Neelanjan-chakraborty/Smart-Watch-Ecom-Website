<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
  body, html {
    margin: 0;
    padding: 0;
    color: azure;
  }
  #hero-banner {
    position: relative;
    display: flex;
    justify-content: flex-start; /* Align content to the left */
    align-items: center;
    height: 100vh; /* Full viewport height */
    overflow: hidden;
    text-align: center;
  }

  #video-box {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0.6;
    filter: grayscale(0.15);
  }

  video {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  /* Style for hero content */
  #hero-content {
    position: relative;
    z-index: 1; /* Bring the content to the front */
    background-color: rgba(0, 0, 0, 0.7); /* Darken background for better contrast */
    padding: 20px;
    border-radius: 10px;
    color: azure;
    text-align: left;
    max-width: 400px;
  }

  #hero-button-container {
    display: flex;
    flex-direction: column;
    margin-top: 20px;
  }

  button {
    display: inline-block;
    height: 40px;
    width: 150px;
    border-radius: 20px;
    margin: 10px 0;
    background-color: #00aaff; /* Blue color */
    border: none;
    user-select: none;
    outline: none;
    color: azure;
    font-weight: 600;
    cursor: pointer;
    transition: opacity 0.2s, box-shadow 0.2s; /* Added box-shadow transition */
    box-shadow: 0 0 10px rgba(0, 170, 255, 0.8); /* Initial box shadow for glowing effect */
  }

  button:hover {
    opacity: 0.85;
    box-shadow: 0 0 20px rgba(0, 170, 255, 1); /* Neon glowing effect on hover */
  }
  .sketchfab-embed-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

</style>

<style>

  /* Styling for Sketchfab container */
  #sketchfabContainer {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
</style>
<section id="hero-banner">
  <div id="video-box">
    <video autoplay muted loop>
      <source src="https://previews.customer.envatousercontent.com/h264-video-previews/a318cdcd-51d1-4be7-9705-86f628489134/45532019.mp4" type="video/mp4">
    </video>
    <div class="sketchfab-embed-wrapper" id="sketchfabContainer" style="display: block;">
      <iframe
          title="smartwatch"
          frameborder="0"
          allowfullscreen mozallowfullscreen="true"
          webkitallowfullscreen="true"
          allow="autoplay; fullscreen; xr-spatial-tracking"
          xr-spatial-tracking
          execution-while-out-of-viewport
          execution-while-not-rendered
          web-share
          src="https://sketchfab.com/models/679c157a6a63435e9f6dd7be49920ea3/embed?autospin=1&autostart=1
";>
      </iframe>
    </div>
  </div>
  <div id="hero-content">
    <h1>Oceanic Smart Watch</h1>
    <hr>
    <p>Experience the future on your wrist. Explore a wide range of cutting-edge smartwatches that seamlessly blend style and technology.</p>
    <div id="hero-button-container">
      <a href="products.php?product_id=14"><button>Shop Now</button></a>
      <button id="toggleViewButton">3D View </button>
    </div>
  </div>
</section>

<script>
  const toggleViewButton = document.getElementById('toggleViewButton');
  const sketchfabContainer = document.getElementById('sketchfabContainer');
  const videoBox = document.getElementById('video-box');

  toggleViewButton.addEventListener('click', () => {
    if (sketchfabContainer.style.display === 'none') {
      videoBox.style.display = 'none';
      sketchfabContainer.style.display = 'block';
      toggleViewButton.textContent = 'Video';
    } else {
      videoBox.style.display = 'block';
      sketchfabContainer.style.display = 'none';
      toggleViewButton.textContent = '3D View';
    }
  });
</script>
