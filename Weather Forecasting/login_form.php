<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>

        *{
            margin: 0;
            padding: 0;
            
        }
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        input[type=text], input[type=password], input[type=email] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
            border-color: #4facfe;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4facfe;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #00f2fe;
        }

        .footer {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .psw {
            font-size: 0.9em;
        }

        .psw a {
            color: #4facfe;
            text-decoration: none;
        }

        .psw a:hover {
            text-decoration: underline;
        }

        .switch a {
            color: #4facfe;
            text-decoration: none;
            font-weight: bold; 
        }
        .switch a:hover {
             text-decoration: underline; 
         }
    </style>
</head>

<body>
    <!-- Login Form -->
    <div class="container" id="loginForm">
        <h2>Login</h2>
       <form id="loginFormElement" onsubmit="return handleLogin(event);" action="weather.php" method="post">

            <div class="input-group">
                <label for="uname">Username</label>
                <input type="text" id="uname" name="uname" placeholder="Enter Username" required>
            </div>

            <div class="input-group">
                <label for="psw">Password</label>
                <input type="password" id="psw" name="password" placeholder="Enter Password" required>
            </div>

            <div class="input-group">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
             </div>

             <button type="submit">Login</button>
             
             <!-- Cancel Button -->
             <div class="footer">
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
             </div>
             
        </form>
    <div class="switch">
             <p>Don't have an account? <a href="javascript:void(0);" onclick="showRegisterForm()">Register</a></p>
         </div>
    </div>

     <!-- Registration Form -->
     <div class="container" id="registerForm" style="display:none;">
         <h2>Register</h2>
         <form action="register.php" method="post">
             <div class="input-group">
                 <label for="uname">Username</label>
                 <input type="text" id="uname" name="uname" placeholder="Enter Username" required>
             </div>

             <div class="input-group">
                 <label for="email">Email</label>
                 <input type="email" id="email" name="email" placeholder="Enter Email" required>
             </div>

             <div class="input-group">
                 <label for="psw">Password</label>
                 <input type="password" id="psw" name="password" placeholder="Enter Password" required>
             </div>

             <div class="input-group">
                 <label for="psw-repeat">Confirm Password</label>
                 <input type="password" id="psw-repeat" name="password-repeat" placeholder="Repeat Password" required>
             </div>

             <button type="submit">Register</button>
             <div class="footer">
                 <button type="button" class="cancelbtn">Cancel</button>
             </div>
         </form>
         <div class="switch">
             <p>Already have an account? <a href="#" onclick="showLoginForm()">Login</a></p>
         </div>
     </div>

     <!-- JavaScript Functions -->
     <script>
         // Global user data object
         let userData = {};

         function handleLogin(event) {
    event.preventDefault(); // Prevent default form submission

    // Capture user input
    const username = document.getElementById('uname').value;

    // Update user data
    userData = {
        username,
        email: "johndoe@example.com",
        location: "New York",
    };

    // Redirect to Weather.php after form submission
    document.getElementById('loginFormElement').submit();
}


         function showRegisterForm() {
             document.getElementById('loginForm').style.display = 'none';
             document.getElementById('registerForm').style.display = 'block';
         }

         function showLoginForm() {
             document.getElementById('loginForm').style.display = 'block';
             document.getElementById('registerForm').style.display = 'none';
         }
     </script>
</body>
</html>
