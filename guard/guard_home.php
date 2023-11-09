<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="guard-design.css">
    <link rel="stylesheet" href="guard-layout.css">
    <link rel="stylesheet" href="guard-interface.css">
</head>
<body>
    <header>
        <img src="guard-header.png" alt="Header Image">
    </header>

<div class="second-container">
<button type="submit" id="signout" class="signout">SIGN OUT</button>
 </div>
 
 <nav id="nav">
    <button id="button1" class="button1" onclick="showIframe(1)">HOME</button>
    <button id="button2" class="button2" onclick="showIframe(2)">REPORT</button>
    <button id="button3" class="button3" onclick="showIframe(3)">ITEMS</button>
    <button id="button4" class="button4" onclick="showIframe(4)">SEARCH</button>
</nav>

<div class="main-content">
    <iframe src="includes/home.php" title="home" frameborder="0" scrolling="no" id="iframe1"></iframe>
    <iframe src="includes/report.php" title="search" frameborder="0" scrolling="no" id="iframe2"></iframe>
    <iframe src="includes/items.php" title="items" frameborder="0" scrolling="no" id="iframe3"></iframe>
    <iframe src="includes/search.php" title="F.A.Q" frameborder="0" scrolling="no" id="iframe4"></iframe>
</div>
<script src="guard-section.js"></script>
<script src="guard-button.js"></script>
</body>
</html>