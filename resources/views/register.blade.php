<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="form-section">
        <div class="form-title">Create a new account</div>
        <form id="registerForm">
          @csrf
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Your username" required />
          </div>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="gmail" id="email" placeholder="you@example.com" required />
          </div>
          <div class="form-group">
            <label for="kontak">Kontak</label>
            <input type="text" name="kontak" id="kontak" placeholder="08123456789" required />
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

          <!-- Pesan error jika registrasi gagal -->
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

  <script>
    document.getElementById('registerForm').addEventListener('submit', function (event) {
      event.preventDefault();

      const data = {
        username: document.getElementById('username').value,
        gmail: document.getElementById('email').value,  // Pastikan mengirimkan "gmail" sesuai model Django
        kontak: document.getElementById('kontak').value,
        password: document.getElementById('password').value,
        password_confirmation: document.getElementById('password_confirmation').value,
      };

      console.log("Data yang akan dikirim: ", data);  // Tambahkan log data yang dikirim

      // Kirim data ke Django API
      fetch('http://127.0.0.1:8080/api/users/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
      })
      .then(response => response.json())
      .then(data => {
        window.location.href = "/login";  // Redirect ke halaman login setelah berhasil
      })
      .catch(error => {
        console.log(error);
        alert("Registration failed: " + error.message);  // Menampilkan error jika registrasi gagal
      });
    });
  </script>

</body>
</html>
