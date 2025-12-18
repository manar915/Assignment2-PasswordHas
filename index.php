<?php
$hash = "";

if (isset($_POST['hash'])) {
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
}

if (isset($_POST['verify'])) {
    $password = $_POST['password'];
    if (password_verify($password, $_POST['stored_hash'])) {
        $result = "Match";
    } else {
        $result = "No Match";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Password Hashing</title>
</head>
<body>

<h2>PHP Password Hashing</h2>

<form method="post">
    <label>Enter Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="hash">Hash</button><br><br>

    <?php if ($hash != "") { ?>
        <label>Hashed Password:</label><br>
        <input type="text" name="stored_hash" value="<?php echo $hash; ?>" readonly><br><br>
        <button type="submit" name="verify">Verify</button>
    <?php } ?>
</form>

<?php
if (isset($result)) {
    echo "<h3>$result</h3>";
}
?>

</body>
</html>