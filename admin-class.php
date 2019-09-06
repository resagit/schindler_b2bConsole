<?php

$paths = "";
$ip="192.168.1.23:8080/ResagitB2B";
//$ip="13.232.126.58:8080/ResagitB2B";
// $ip="52.66.214.215:8080/ResagitB2B_Schindler";

/** Include the database file */
error_reporting(0);
ini_set('html_errors', 0);
ini_set('display_errors', 0);

function get_form_name_value($k) {
  if (isset($_GET[$k])) {
    $back = str_replace("+", "%20", str_replace("%2F", "~", urlencode(trim(ucwords($_GET[$k])))));
    return $back;
  }
  elseif (isset($_POST[$k])) {
    $back1 = str_replace("+", "%20", str_replace("%2F", "~", urlencode(trim(ucwords($_POST[$k])))));
    return $back1;
  }
}

/*
  $dbuser = 'root';
  $dbname = 'smartgini';
  $dbpassword = 'usbw';
  $dbhost = 'localhost';

  // Database connect
  mysql_connect($dbhost,$dbuser,$dbpassword);
  mysql_select_db('smartgini');
 */

class itg_admin {

  /**
   * Holds the script directory absolute path
   * @staticvar
   */
  static $abs_path;

  /**
   * Store the sanitized and slash escaped value of post variables
   * @var array
   */
  var $post = array();

  /**
   * Stores the sanitized and decoded value of get variables
   * @var array
   */
  var $get = array();

  /**
   * The constructor function of admin class
   * We do just the session start
   * It is necessary to start the session before actually storing any value
   * to the super global $_SESSION variable
   */
  public function __construct() {
    session_start();

    //store the absolute script directory
    //note that this is not the admin directory
    self::$abs_path = dirname(dirname(__FILE__));

    //initialize the post variable
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $this->post = $_POST;
      if (get_magic_quotes_gpc()) {
        //get rid of magic quotes and slashes if present
        array_walk_recursive($this->post, array($this, 'stripslash_gpc'));
      }
    }

    //initialize the get variable
    $this->get = $_GET;
    //decode the url
    array_walk_recursive($this->get, array($this, 'urldecode'));
  }

  public function _Status() {

    $url = 'http://' . $ip . ':8080/SmartGiniWeb/CreditTotal';
    $fields = array(
        'username' => urlencode($username)
            /* 'Provider' => urlencode($Provider),												
              'Amount' => urlencode($Amount),
              'Tpin' => urlencode($Tpin),
              'bal' => urlencode($bal)
             */
    );
    //url-ify the data for the POST
    foreach ($fields as $key => $value) {
      $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');

    //open connection
    $ch = curl_init();

    //c the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

    //execute post
    $result = curl_exec($ch);


    //close connection
    curl_close($ch);
    //$finalstr="hjsdksdhskdh*".$bal_new;
    //echo $finalstr;
  }

  /**
   * Checks whether the users is authenticated
   * to access the admin page or not.
   *
   * Redirects to the login.php page, if not authenticates
   * otherwise continues to the page
   *
   * @access public
   * @return void
   */
  public function _authenticate() {
    //$cUsername=$_COOKIE['user_name'];
    //$cPass=$_COOKIE['pass'];
    //echo $cPass;
    // echo "<script type='text/javascript'>alert("+$_SESSION['admin_login']");</script>";
    //echo "sess".$_SESSION['ad_pass'];
    //first check whether session is set or not
    if (!isset($_SESSION['admin_login']) && !isset($_SESSION['ad_pass'])) {
      //check the cookie
      if (isset($_COOKIE['user_name']) && isset($_COOKIE['pass'])) {
        //cookie found, is it really someone from the

        $_SESSION['admin_login'] = $_COOKIE['user_name'];
        $_SESSION['ad_pass'] = $_COOKIE['pass'];
        header("location: ../login.php?r=fail");
        //	$cUsername=$_COOKIE['user_name'];
        //$cPass=$_COOKIE['pass'];
        //	echo 'userName:'+$cUsername+'passs:'+$cPass;





        if ($this->_check_db($_COOKIE['user_name'], $_COOKIE['pass'])) {
          $_SESSION['admin_login'] = $_COOKIE['user_name'];
          $_SESSION['ad_pass'] = $_COOKIE['pass'];
          $lang = $_COOKIE['l'];
          if ($lang == "en") {
            header("location: /index.php");
          }
          else if ($lang == "hi") {

            header("location: hi/index.php");
          }

          die();
        }
        else {
          header("location: ../login.php?r=fail");
          die();
        }
      }
      else {
        header("location: ../login.php?r=fail");
        die();
      }
    }
  }

  public function _langcheck() {
    //first check whether session is set or not

    $lang = $_COOKIE['l'];
    //echo "<br />l: $lang <br />";
    if ($lang == "en") {
      header("location: en/index.php");
    }
    else if ($lang == "hi") {

      header("location: hi/index.php");
    }
    else {

      header("location: login.php");
    }
  }

  /**
   * Check for login in the action file
   */
  public function _login_action() {

    //insufficient data provided
    if (!isset($this->post['user_name']) || $this->post['user_name'] == '' || !isset($this->post['pass']) || $this->post['pass'] == '') {
      header("location: ../login.php?f=1");
    }

    //get the username and password
    $username = $this->post['user_name'];
    $password = sha1(md5($this->post['pass']));
    $password1 = $this->post['pass'];

    //echo "<br /> p1: ".sha1($this->post['pass'])."<br />";
    //echo "<br />u: $username p: $password<br />";
    //echo "<br />u: $username p: $password<br />";
    //check the database for username
    //ready to login
    $_SESSION['admin_login'] = $username;
    $_SESSION['ad_pass'] = $password;
    $_SESSION['timeout'] = time();



    //check to see if remember, ie if cookie
    if (isset($this->post['remember'])) {

      //echo "checkedH: "+$username;
      setcookie('user_name', $username, time() + (10 * 365 * 24 * 60 * 60));
      setcookie('pass', $password, time() + (10 * 365 * 24 * 60 * 60));
      //set the cookies for 1 day, ie, 1*24*60*60 secs
      //change it to something like 30*24*60*60 to remember users for 30 days
      // setcookie('user_name', $username, time() + 30*24*60*60);
      //  setcookie('pass', $password, time() + 30*24*60*60);
    }
    else {
      //destroy any previously set cookie
      setcookie('user_name', '', time() - 30 * 24 * 60 * 60);


      setcookie('pass', '', time() - 30 * 24 * 60 * 60);
    }

    $lang = $_COOKIE['l'];


    if ($lang == "en") {

      //header("location: index.php?lang=English");
      header("location: en/index.php");
      setcookie('l', $lang, time() + 30 * 24 * 60 * 60);
      $_SESSION['l'] = $username;
    }
    else if ($lang == "hi") {

      header("location: hi/index.php");
      setcookie('l', $lang, time() + 30 * 24 * 60 * 60);
      $_SESSION['l'] = $username;
    }
    else {


      //header("location: index.php?lang=English");


      session_start();
      $_SESSION['user_name'] = $username;
      $_SESSION['pass'] = $password; // store session data

      echo "user_name H = " . $_SESSION['user_name']; //retrieve data
      echo "pass H = " . $_SESSION['pass']; //retrieve data 
      echo "admin_login H = " . $_SESSION['admin_login'];
      header("location: en/index.php");
      setcookie('l', $lang, time() + 30 * 24 * 60 * 60);
    }
  }

  /**
   * stripslash gpc
   * Strip the slashes from a string added by the magic quote gpc thingy
   * @access protected
   * @param string $value
   */
  private function stripslash_gpc(&$value) {
    $value = stripslashes($value);
  }

  /**
   * htmlspecialcarfy
   * Encodes string's special html characters
   * @access protected
   * @param string $value
   */
  private function htmlspecialcarfy(&$value) {
    $value = htmlspecialchars($value);
  }

  /**
   * URL Decode
   * Decodes a URL Encoded string
   * @access protected
   * @param string $value
   */
  protected function urldecode(&$value) {
    $value = urldecode($value);
  }

}
