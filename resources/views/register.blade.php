<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
</head>
<body>
  <div class="container">
    <form id="registerForm">
      @csrf
      <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required />
      </div>
      <div>
        <label for="email">Email</label>
        <input type="email" name="gmail" id="email" required />
      </div>
      <div>
        <label for="kontak">Kontak</label>
        <input type="text" name="kontak" id="kontak" required />
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required />
      </div>
      <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required />
      </div>
      <button type="submit">Register</button>
    </form>
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
