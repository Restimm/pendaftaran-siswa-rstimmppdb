<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style-login.css">
	<style>/* Reset CSS */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Body styles */
body {
  font-family: Arial, sans-serif;
  background-color: #f1f1f1;
}

/* Login container styles */
.login-container {
  width: 400px;
  margin: 100px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Title styles */
.title-login {
  text-align: center;
  color: #333;
  margin-bottom: 20px;
}

/* Label styles */
.label-login {
  display: block;
  margin-bottom: 5px;
  color: #333;
}

/* Input styles */
.input-login {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

/* Button styles */
button {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
}

button:hover {
  background-color: #0056b3;
}

/* Hyperlink styles */
a {
  color: #007bff;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}
</style>
</head>
<body>

	<div class="login-container">
	  <h2 class="title-login">Login Form Admin</h2>
		<form action="function.php?op=in" method="post">
			<label class="label-login">Username</label>
			<input type="text" name="username" class="input-login">
			<label class="label-login">Password</label>
			<input type="password" name="password" class="input-login">
			<button>LOGIN</button> 
		</form>
        <p> 
        <a href="index.php">Kembali ke halaman utama</a> </p>
	</div>
</body>
</html>
