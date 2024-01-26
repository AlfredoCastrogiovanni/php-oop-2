<?php
    require_once __DIR__ . '/../php/functions.php';
    require_once __DIR__ . '/../php/costants.php';

    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }

    $connection = new mysqli(DB_ADDRESS, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ( $connection && $connection->connect_error){
        var_dump("Failed connection with the database, with error $connection->connect_error" );
    }

    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password'])){
        register($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password'], $connection);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <!-- Boostrap CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand me-auto" href="../index.php">OOPShop</a>
                <a href="login.php">
                    <button class="btn btn-success me-2">Login</button>
                </a>
            </div>
        </nav>

        <main>
            <div class="container mt-5">
                <form class="row g-3" action="register.php" method="POST">
                    <div class="col-12">
                        <h1 class="text-center">Register</h1>
                    </div>
                    <div class="col-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="col-12">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" class="form-control" name="surname" id="surname">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>

<?php $connection->close(); ?>