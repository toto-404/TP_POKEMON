<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form method="POST" action="./?action=inscription">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="user_password">Password:</label>
        <input type="password" id="user_password" name="user_password" required><br><br>
        <input type="submit" value="Inscription">
    </form>
</body>
</html>