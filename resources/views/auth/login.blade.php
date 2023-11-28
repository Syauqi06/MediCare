<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <title>MEDICARE | Login</title>
    
</head>
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #d8d2d2;
        }
        .kotak
        {
          border-radius: 5px;
        }
    </style>
<body style="background-color: #e6e6e6">
    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center kotak" style="background-color: #FFFFFF">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="{{ asset('gambar/logomedicare.png') }}" width="600px"
                class="img-fluid" alt="image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
              <h1 style="text-align:center; padding-bottom:10px">MediCare</h1>
              <form method="POST" action="" style="padding-bottom: 10px; padding-right:10px">
                @csrf
                <!-- Email input -->
                <h2></h2>
                <div class="form-outline mb-4">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" name="username" class="form-control form-control-lg" />
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg" />
                </div>
      
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-lg btn-block" >Login</button>
               </form>
            </div>
          </div>
        </div>
      </section>
    </body>
</html>
