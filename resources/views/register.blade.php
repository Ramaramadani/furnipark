<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}"> {{-- Pakai CSS login --}}
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="form-section">
        <div class="form-title">Create a new account</div>
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Your username" required />
          </div>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" placeholder="you@example.com" required />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="********" required />
          </div>
          <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="********" required />
          </div>
          <button type="submit" class="submit-btn">Register</button>

          @if($errors->has('register'))
            <div style="color:red; margin-top:1rem;">{{ $errors->first('register') }}</div>
          @endif
        </form>
        <div class="form-footer">
          Already have an account?
          <a href="{{ route('login') }}">Login here</a>
        </div>
      </div>
      <div class="illustration-section"></div>
    </div>
  </div>
</body>
</html>
