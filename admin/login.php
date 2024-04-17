<?php require_once('../config.php') ?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are set
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Assuming you have a function to validate user credentials
        $isValidUser = validateUser($_POST['username'], $_POST['password']);
        
        if ($isValidUser) {
            // Assuming you have a function to get user type based on username
            $userType = getUserType($_POST['username']);
            
            // Redirect based on user type
            if ($userType == 1 || $userType == 2) {
                header("Location: admin/admin.php");
                exit();
            } elseif ($userType == 3) {
                header("Location: index.php");
                exit();
            } else {
                // Invalid user type
                echo "Invalid user type";
            }
        } else {
            // Invalid username or password
            echo "Invalid username or password";
        }
    } else {
        // Username or password not set
        echo "Username or password not set";
    }
}

// Function to validate user credentials (dummy function)
function validateUser($username, $password) {
    // Dummy validation, replace with your actual validation logic
    // For example, check against a database
    $validUsers = array(
        'user1' => 'password1',
        'user2' => 'password2',
        'user3' => 'password3'
    );
    
    if (isset($validUsers[$username]) && $validUsers[$username] == $password) {
        return true;
    } else {
        return false;
    }
}

// Function to get user type (dummy function)
function getUserType($username) {
    // Dummy user types, replace with your actual logic
    $userTypes = array(
        'user1' => 1, // Admin
        'user2' => 2, // Admin
        'user3' => 3  // Regular user
    );
    
    if (isset($userTypes[$username])) {
        return $userTypes[$username];
    } else {
        // Default to regular user if user type not found
        return 3;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('inc/header.php') ?>
<body class="hold-transition">
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #437ABD;
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .login-container {
           height: auto; /* Change height to auto */
            max-width: 450px;
            width: 90%; /* Adjust width for responsiveness */
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

      .login-form {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%; /* Ensure the form takes the full height */
}


        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: calc(100%);
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            align-items: center ;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        .login-form button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-form button:hover {
            background-color: #45a049;
        }

        .login-form .form-footer {
            margin-top: 20px;
            text-align: center;
        }

        .login-form .form-footer a {
            color: #4CAF50;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-form .form-footer a:hover {
            color: #45a049;
        }

   .login-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .login-tabs a {
            text-decoration: none;
            color: #777;
            font-weight: bold;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 5px 5px 0 0;
            transition: color 0.3s, background-color 0.3s;
        }

        .login-tabs a.active-tab {
            color: #4CAF50;
            background-color: #fff;
            border-bottom: 2px solid #4CAF50;
        }

        .login-tabs a:hover {
            color: #555;
        }

        .login-container {
            max-width: 450px;
            width: 90%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-form {
            padding: 40px;
        }


        .signup-form {
    padding: 40px;
}

.signup-input {
    width: 100%;
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}

.signup-button {
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 5px;
    background-color: #4CAF50;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    height: 50px;
    box-sizing: border-box;
}

/* Style the signup button */

.signup-button:hover {
    background-color: #0056b3; /* Darker shade of blue on hover */
}
.signup-button:hover {
    background-color: #45a049;
}

.forgot-password {
    text-align: end; 
    margin-bottom: 10px;
}

.forgot-password a {
    color: #4CAF50;
    text-decoration: none;
    transition: color 0.3s ease;
}

.forgot-password a:hover {
    color: #45a049;
}


        .forgot-password-link {
            text-align: center;
            margin-top: 10px;
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50%);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container {
            animation: slideIn 0.5s ease forwards;
        }

        .login-titles {
            text-align: center; 
        }

        /* Styles for the show/hide password icon */
        .password-toggle {
            position: relative;
        }

        .password-toggle .toggle-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }


          .signupPassword-toggle .toggle-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
  .add-dog-button {
        background-color: #4CAF50;
        color: white;
        border: none;
      
        margin-bottom: 10px;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .add-dog-button:hover {
        background-color: #45a049;
    }

    .forgot-password-link {
            text-align: end;
            margin-top: 10px;
            cursor: pointer;
            color: #4CAF50;
            text-decoration: underline;
        }

        .modal-content {
          
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 <div class="login-container">
        <div class="login-tabs">
            <a href="#" id="login-tab" class="active-tab">Login</a>
            <a href="#" id="signup-tab">Sign Up</a>
        </div>
        <div class="login-form">
            <h1 class="login-titles">Login</h1>
            <form id="login-frm" action="" method="post">
                <input type="text" autofocus name="username" placeholder="Username">
                <div class="password-toggle">
                    <input type="password" name="password" id="login-password" placeholder="Password">
                    <span class="toggle-icon" onclick="togglePassword('login-password')"><i class="fas fa-eye"></i></span>
                </div>
              
           <div class="forgot-password-link" data-toggle="modal" data-target="#forgotPasswordModal">Forgot Password?</div>
          
                <button type="submit">Sign In</button>
                <div class="form-footer">
                    <a href="<?php echo base_url ?>">Go to Website</a>
                </div>
            </form>
        </div>
       <div class="signup-form" style="display: none;">
            <h1 class="login-titles">Sign Up</h1>
          <form id="signup-frm" method="POST" action="/Signup.php">
                <!-- Your form fields here -->
                <input type="text" name="firstname" placeholder="First Name" class="form-control" required>
                <input type="text" name="lastname" placeholder="Last Name" class="form-control" required>
                <input type="email" name="email" placeholder="Email" class="form-control" required>
                <div class="password-toggle">
                    <input type="password" name="password" id="signup-password" placeholder="Password" class="form-control" required>
                    <span class="toggle-icon" onclick="togglePassword('signup-password')"><i class="fas fa-eye"></i></span>
                </div>
                <div class="password-toggle">
                    <input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm Password" class="form-control" required>
                    <span class="toggle-icon" onclick="togglePassword('confirm-password')"><i class="fas fa-eye"></i></span>
                </div>
                <button type="submit" class="signup-button">Sign Up</button>
            </form>
        </div>
        
        <div class="login-logo"></div>
        
    </div>
 <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="forgotPasswordForm" method="post" action="forgot_password.php">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

<!-- Include Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Bootstrap JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

    <script> 
        $(document).ready(function(){
            // Your JavaScript code here
        });

        function togglePassword(fieldId) {
            var passwordField = document.getElementById(fieldId);
            var icon = passwordField.nextElementSibling.querySelector(".toggle-icon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordField.type = "password";
                icon.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }

        $(document).ready(function(){
            $("#add-dog-btn").click(function() {
                // Clone the first dog-detail div and append it to the dog-details section
                var clonedDogDetail = $(".dog-detail:first").clone();
                $("#dog-details").append(clonedDogDetail);
            });

            $("#signup-tab").click(function(e){
                e.preventDefault();
                $(".login-form").hide();
                $(".signup-form").show();
                $(".login-tabs a").removeClass("active-tab");
                $(this).addClass("active-tab");
            });

            $("#login-tab").click(function(e){
                e.preventDefault();
                $(".signup-form").hide();
                $(".login-form").show();
                $(".login-tabs a").removeClass("active-tab");
                $(this).addClass("active-tab");
            });
        });
    </script>


</body>
</html>



