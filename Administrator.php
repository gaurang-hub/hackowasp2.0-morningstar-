<!DOCTYPE html>
<html>
<title>Administration page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
    <a href="#home" class="w3-bar-item w3-button">Arinjay_24</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-bar-item w3-button">Transactions</a>
      <a href="#menu" class="w3-bar-item w3-button">Pending Transactions</a>
      <a href="#contact" class="w3-bar-item w3-button">Contact</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
  <img class="w3-image" src="images/ad1.jpg" alt="Hamburger Catering" width="1600" height="800">
  <div class="w3-display-bottomleft w3-padding-large w3-opacity">
    <h1 class="w3-xxlarge">Finance Blocks</h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="images/ad.jpeg" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="800" height="950">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">Fresh Transactions</h1><br>
      <ul>
       <li><h4>Gaurang_12</h4><li>
      <p class="w3-text-grey">Trasaction amount $300 to Fire_wings</p><br>
      
       <li><h4>TusharChug</h4><li>
      <p class="w3-text-grey">Trasaction amount $789 to Prachi_211</p><br>
    
      <li><h4>GarvitNangia</h4><li>
      <p class="w3-text-grey">Trasaction amount $789 to Prachi_++</p><br>

      <li><h4>Gaurang_12</h4><li>
      <p class="w3-text-grey">Trasaction amount $300 to Fire_wings</p><br>

     <li><h4>Harsh</h4><li>
      <p class="w3-text-grey">Trasaction amount $70000 to Association_tom</p><br>
    </ul>
    </div>
  </div>
  
  <hr>
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">Pending Transactions</h1><br>
      <ul>
      <li><h4>Gaurang_12</h4><li>
      <p class="w3-text-grey">Trasaction amount $300 to Fire_wings</p><br>
      
       <li><h4>TusharChug</h4><li>
      <p class="w3-text-grey">Trasaction amount $789 to Prachi_211</p><br>
    
      <li><h4>GarvitNangia</h4><li>
      <p class="w3-text-grey">Trasaction amount $789 to Prachi_++</p><br>

      <li><h4>Gaurang_12</h4><li>
      <p class="w3-text-grey">Trasaction amount $300 to Fire_wings</p><br>

     <li><h4>Harsh</h4><li>
      <p class="w3-text-grey">Trasaction amount $70000 to Association_tom</p><br>  
      </ul> 
    </div>
    
    <div class="w3-col l6 w3-padding-large">
      <img src="images/ad2.jpg" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%">
    </div>
  </div>

  <hr>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-64" id="contact">
    <h1>Contact</h1><br>
    <p>We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste. Do not hesitate to contact us.</p>
    <p class="w3-text-blue-grey w3-large"><b>Catering Service, 42nd Living St, 43043 New York, NY</b></p>
    <p>You can also contact us by phone 00553123-2323 or email catering@catering.com, or you can send us a message here:</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16" type="number" placeholder="How many people" required name="People"></p>
      <p><input class="w3-input w3-padding-16" type="datetime-local" placeholder="Date and time" required name="date" value="2017-11-16T20:00"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-section" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
  
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>
