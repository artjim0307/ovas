<?php
require_once '../config.php';
class Login extends DBConnection
{
	private $settings;
	public function __construct()
	{
		global $_settings;
		$this->settings = $_settings;

		parent::__construct();
		ini_set('display_error', 1);
	}
	public function __destruct()
	{
		parent::__destruct();
	}
	public function index()
	{
		echo "<h1>Access Denied</h1> <a href='" . base_url . "'>Go Back.</a>";
	}


public function login()
{
    extract($_POST);
    $type = isset($type) ? $type : 1;

    if ($type == 3) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param('ss', $username, $password);
        $login_type = 3;
           $redirect_url = 'admin/?page=dashboard';
    } elseif ($type == 2) {
        $stmt = $this->conn->prepare("SELECT *, CONCAT(lastname, ', ', firstname, ' ', middlename) AS fullname FROM client_list WHERE email = ? AND `password` = ?");
        $pw = md5($password);
        $stmt->bind_param('ss', $email, $pw);
        $login_type = 2;
        $redirect_url = 'admin/index.php'; 
    } else {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param('ss', $username, $password);
        $login_type = 1;
       $redirect_url = 'admin/index.php'; 
    }

    $stmt->execute();

    if ($stmt->error) {
        error_log('MySQL Error: ' . $stmt->error);
    }

    $qry = $stmt->get_result();

    if ($qry->num_rows > 0) {
        $res = $qry->fetch_array();
        if ($res['status'] == 1) {
            // Set user data and return success status along with redirect URL
            foreach ($res as $k => $v) {
                if (!is_numeric($k) && $k != 'password') {
                    $this->settings->set_userdata($k, $v);
                }
            }
            $this->settings->set_userdata('login_type', $login_type);

            return json_encode(array('status' => 'success', 'redirect' => $redirect_url));
        } else {
            // Return not verified status if user status is not 1
            return json_encode(array('status' => 'notverified'));
        }
    } else {
        // Return incorrect status if no matching user found
        return json_encode(array('status' => 'incorrect'));
    }
}


	public function logout()
	{
		if ($this->settings->sess_des()) {
			redirect('admin/login.php');
		}
	}
	


public function signup()
{
    extract($_POST);

    if ($password !== $confirm_password) {
    
        echo json_encode(array('status' => 'error', 'message' => 'Passwords do not match'));
        return; 
    }

  
    $stmt_check = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt_check->bind_param('s', $username);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

   
    if ($result->num_rows > 0) {
       
        echo json_encode(array('status' => 'error', 'message' => 'Username "' . $username . '" already exists'));
        return;
    }

  
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  
    $stmt = $this->conn->prepare("INSERT INTO users (firstname, middlename, lastname, username, password, type) VALUES (?, ?, ?, ?, ?, '3')");
    
    // Bind parameters
    $stmt->bind_param('sssss', $firstname, $middlename, $lastname, $email, $password);

    // Execute the SQL statement
    if ($stmt->execute()) {
 
        echo json_encode(array('status' => 'success', 'message' => 'User registered successfully'));
 
    } else {
        // Error occurred during user registration
        echo json_encode(array('status' => 'error', 'message' => 'Error registering user'));
    }
}


}

$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$auth = new Login();
switch ($action) {
	case 'login':
		echo $auth->login();
		break;
	case 'logout':
		echo $auth->logout();
		break;
		case 'signup':
    echo $auth->signup();
    break;
	default:
		echo $auth->index();
		break;
}

?>