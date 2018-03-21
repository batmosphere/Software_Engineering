<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery.post demo</title>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<form action="proceed.php" id="searchForm">
  <input type="text" name="s" placeholder="Search...">
  <input type="submit" value="Search">
</form>
<!-- the result of the search will be rendered inside this div -->
<div id="result"></div>
 
<script>
var name = "bits pilani";
document.cookie = "username="+name;
// $('#searchForm').onsubmit(fun {
// 	// location.replace("proceed.php");
// });
</script>
 
</body>
</html>