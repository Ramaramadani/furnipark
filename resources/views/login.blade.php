<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="form-section">
        <h2 class="form-title">Login to Your Account</h2>

        <!-- Menampilkan pesan sukses jika login berhasil -->
        @if(session('success'))
          <div class="alert alert-success" style="color: green; margin-bottom: 1rem;">
            {{ session('success') }}
          </div>
        @endif

        <!-- Menampilkan pesan error jika login gagal -->
        @if(session('error'))
          <div class="alert alert-danger" style="color: red; margin-bottom: 1rem;">
            {{ session('error') }}
          </div>
        @endif

        <form id="loginForm" method="POST" action="{{ route('login') }}">
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

      <div class="illustration-section"></div> <!-- Optional image section -->
    </div>
  </div>

  {{-- 
<script>
  document.getElementById('loginForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const data = {
      username: document.getElementById('username').value,
      password: document.getElementById('password').value,
    };
    fetch('http://127.0.0.1:8080/api/users/login/', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
      if (data.token) {
        localStorage.setItem('token', data.token);
        window.location.href = "/profile";
      } else {
        alert("Login failed. Invalid credentials.");
      }
    })
    .catch(error => {
      console.log(error);
      alert("Login failed.");
    });
  });
</script>
--}}

</body>
</html>
