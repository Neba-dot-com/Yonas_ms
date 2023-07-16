<?php
echo "
<div class='TopBar'>
<div class='logo'>
    <h1>Yonas <span style='color: white;'><b>M S</b> </span></h1>
</div>

<div class='Search'>
    <input type='text' placeholder='Search Here' name='search'>
    <label for='search'><i class='fas fa-search'></i></label>
</div>

<i class='fas fa-bell'></i>

<div class='user'>
  <a href='managerlog.php'>   <img src='manager.png' alt=''> </a>
<a href='expired.php'> <div id='notificationButton'>
    <button id='notificationIcon'><i class='fas fa-bell fa-2x'></i></button> <a>
    <span id='notificationCount'>0</span>
</div>
</div>
"

?>