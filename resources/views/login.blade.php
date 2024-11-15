<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body style="background-color: #eee;">
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-10 col-lg-8 col-xl-6">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-5">
                            <h3 class="text-center fw-bold mb-5">Login</h3>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="email" class="form-label">Your Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required />
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required />
                                </div>

                                <div class="d-flex justify-content-center mp-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                    <a href="{{route('registerPage')}}" class="btn btn-primary">Register</a>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
