<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="container">
      <div class="row justify-content-center" style="margin-top: 100px">
        <div class="col-lg-5">
          <main class="form-registration w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
              <form action="/register" method="POST">
                @csrf
                <div class="form-floating">
                  <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="fullname" placeholder="FullName" required value="{{ old('fullname') }}">
                  <label for="name">fullName</label>
                  @error('fullname')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-floating" style="margin-top: 5px">
                  <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
                  <label for="email">username</label>
                  @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-floating" style="margin-top: 5px">
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                  <label for="password">Password</label>
                  @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
              </form>
              <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
          </main>
        </div>
      </div>

    </div>
</body>
</html>