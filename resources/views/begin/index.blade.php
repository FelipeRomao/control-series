<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Begin</title>

    <!-- Custom styles for this template -->
    <link href="{{ URL::to('css/begin.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        @include('errors', ['errors' => $errors])
        <main class="form-signin">
            <form method="post">
                @csrf
                <img class="mb-4" src="https://www.freepnglogos.com/uploads/company-logo-png/company-logo-transparent-png-19.png" alt="" height="140" width="200">
                <h1 class="h3 mb-3 fw-normal">Please log in</h1>

                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>

                <div class="checkbox mb-3 d-flex align-items-center justify-content-center">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Sign in</button>
                <a class="w-100 btn btn-lg btn-secondary" href="/signUp">Sign up</a>
            </form>
        </main>
    </div>
</body>
</html>
