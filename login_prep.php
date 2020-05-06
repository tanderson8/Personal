<html>
<body>
<?php
$db_hostname='localhost';
$db_username='root';
$db_password='Thirteen13!';
$db_dbname='testdb';
$db_tablename='users';
$db_conn_str="mysql:host=$db_hostname;dbname=$db_dbname";

try {
  $db = new PDO($db_conn_str, $db_username, $db_password);
   //$queryStr = "select * from $db_tablename where login = '" . $_POST["user"] . "' and passwd = '" . $_POST["pass"] . "'";
   $queryStr = "select * from $db_tablename where login = ? and passwd = ?";
echo "$queryStr <br /><br />";
   $result = $db->prepare($queryStr);
   $result->execute(array($_POST["user"], $_POST["pass"]));

  $num=$result->rowCount();
} catch (PDOException $e) {
  echo "Error in PDO: " . $e->getMessage();
}
if ($num == 0) {
  echo "<p style='color:red'>Login failed!!<p />";
} else {
  $name = $result->fetchColumn(0);
  echo "<p style='color:blue'>Welcome, $name!!<p />";
}
?>
</body>
</html>
