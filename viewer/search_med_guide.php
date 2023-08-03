<?php

echo "

<div class='search'>
<form action='medresult.php' method='GET' class='search-bar' style='border-bottom:none; border-left: none; border-right:none;'>
<input type='text' name='query' id='searchInput' placeholder='Find more about my Medicine' value='" . (isset($_GET['query']) ? $_GET['query'] : '') . "'>
<button type='submit' style='  border: 0; border-radius: 50%;width: 20px;height: 60px; background-image: none; '> <img src='img/search.png'> </button>
</form>
</div>

";
echo "<script>
let timerId;

document.getElementById('searchInput').addEventListener('input', function() {
  clearTimeout(timerId);
  timerId = setTimeout(function() {
    this.form.submit();
  }.bind(this), 1000);
});
</script>

";
?>

