<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div style="height: 100vh;">
        <div class="row h-100 m-0">
            <div class="card w-25 my-auto mx-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center">Sign In</h1>
                </div>
                <div class="card-body">
                    <form action="../actions/login.php" method="post">
                        <input type="text" name="username" id="username" placeholder="USERNAME" class="form-control mb-2" required autofocus>

                        <input type="password"name="password" id="password" placeholder="PASSWORD" class="form-control mb-5" required>

                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <!--link for creating account-->
                    <p class="text-center mt-3 small">
                        <a href="register.php">Create Account</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
</body>
</html>