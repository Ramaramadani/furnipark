<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="form-section">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="yourusername" required />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="********" required />
          </div>
          <button type="submit" class="submit-btn">Login</button>

          {{-- Pesan sukses setelah register --}}
          @if(session('success'))
            <div style="color:green; margin-top:1rem;">{{ session('success') }}</div>
          @endif

          {{-- Pesan error jika login gagal --}}
          @if($errors->has('login'))
            <div style="color:red; margin-top:1rem;">{{ $errors->first('login') }}</div>
          @endif
        </form>

        <div class="form-footer">
          Don't have an account?
          <a href="{{ route('register') }}">Sign up here</a>
        </div>
      </div>
      <div class="illustration-section"></div>
    </div>
  </div>
</body>
</html>
