<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PGSO</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
</head>

<body>
    <!-- Section: Design Block -->
    <section class="">
        <div class="container">
            <div class="card">
                <div class="card-body shadow-lg">
                    <div class="row gx-lg-5 align-items-center">
                        <div class="col-lg-6 mb-5 text-center mb-lg-0">
                            <img class="rounded-circle py-1 mb-3" src="{{ asset('assets/img/LOGO.png')}}" alt="Logo"
                                style="width: 150px;">
                            <h4><b>Provincial General Services Office</b></h4>
                            <hr>
                            <h4>Property Records, Archival, and Inventory Management Division</h4>
                        </div>
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <div class="card">
                                <div class="card-body py-5 px-md-5">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example3">Email address</label>
                                            <input type="email" name="email" id="form3Example3" class="form-control" />
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example4">Password</label>
                                            <input type="password" name="password" id="form3Example4"
                                                class="form-control" />
                                        </div>

                                        <!-- Submit button -->
                                        <div class="buttons text-center">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block mb-4">
                                                Log In
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
</body>

</html>