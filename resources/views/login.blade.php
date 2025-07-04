<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
  <div class="container">
    <form id="loginForm">
      @csrf
      <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required />
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required />
      </div>
      <button type="submit">Login</button>
    </form>
  </div>

  <script>
document.getElementById('loginForm').addEventListener('submit', function (event) {
  event.preventDefault();

  const data = {
    username: document.getElementById('username').value,
    password: document.getElementById('password').value,
  };

  // Construct query string for GET request
  const queryParams = new URLSearchParams(data).toString();

  // Send GET request to retrieve users and validate credentials
  fetch(`http://127.0.0.1:8080/api/users/?${queryParams}`, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    },
  })
  .then(response => response.json())
  .then(data => {
    if (data.token) {
      localStorage.setItem('token', data.token);  // Save JWT token in localStorage
      window.location.href = "/profile";  // Redirect to profile page after successful login
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


</body>
</html>
