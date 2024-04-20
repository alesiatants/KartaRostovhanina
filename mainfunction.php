<?php
class Connection{
	private $servername = "localhost";
    private $username   = "root";
    private $password   = "";
    private $database   = "cardrostow";
		public  $con;
		public function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
        if(mysqli_connect_error()) {
       trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        }else{
      return $this->con;
        }
    }
}
interface TableViewer{
	public function displayAll();
}
interface TableFinder{
	public function displyaRecordById($id);
}
interface TableRepository{
	public function insert($post, $session);
	public function update($post, $session);
	public function delete($id, $session);
}
class TAttractionsViewer implements TableViewer{
	public function displayAll()
	{
		$con = new Connection();
		$query = "SELECT * FROM Attractions;";
				$result = $con->con->query($query);
				if ($result->num_rows > 0) {
					$data = array();
					while ($row = $result->fetch_assoc()) {
								 $data[] = $row;
					}
				 return $data;
	}		
	}}
	class TMeropriatieViewer implements TableViewer{
		public function displayAll()
		{
			$con = new Connection();
			$query = "SELECT * FROM Meropiatie;";
					$result = $con->con->query($query);
					if ($result->num_rows > 0) {
						$data = array();
						while ($row = $result->fetch_assoc()) {
									 $data[] = $row;
						}
					 return $data;
		}		
		}}
class TServiceDicountViewer implements TableViewer{
	public function displayAll()
	{
		$con = new Connection();
		$ob = new TUserFinder();
		$type = $ob->displyaTypeByKlient($ob->find_by_name_pass($_SESSION['user']['login'], $_SESSION['user']['password'])['id']);
		$id = $type['id'];
		$query = "SELECT name_magazin, discount, photo FROM magazin_disc WHERE id_type_ben='$id';";
				$result = $con->con->query($query);
				if ($result->num_rows > 0) {
					$data = array();
					while ($row = $result->fetch_assoc()) {
								 $data[] = $row;
					}
				 return $data;
			}		
	}

}
class TTypeViewer implements TableViewer{
	public function displayAll()
	{
		$con = new Connection();
		
		$query = "SELECT type_benefits FROM benefits;";
				$result = $con->con->query($query);
				if ($result->num_rows > 0) {
					$data = array();
					while ($row = $result->fetch_assoc()) {
								 $data[] = $row;
					}
				 return $data;
			}		
	}
}
class TUserViewer implements TableViewer{
	public function displayAll()
	{
		$con = new Connection();
		$query="SELECT * FROM klient";
		$result = $con->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
						 $data[] = $row;
			}
		 return $data;
	}

}}
class TUserFinder implements TableFinder{
	public function find_user($snils, $oms){
		$us = new TUserViewer();
		$user = $us->displayAll();
		/*$query="SELECT * FROM users";
		$result = $con->con->query($query);*/
		foreach($user as $u){
				if($u['snils']==$snils && $u['polis']==$oms){
					return true;
				}}
	}
	public function find_by_email_pass($fname,$pass){
		//$con = new Connection();
		$us = new TUserViewer();
		$user = $us->displayAll();
		/*$query="SELECT * FROM users";
		$result = $con->con->query($query);*/
		foreach($user as $u){
				if($u['fname']==$fname && $u['password_klient']==substr($pass,0,20)){
				
					return true;
				}
	}}
	public function find_card_by_id_user($id){
		$con = new Connection();
		$query="SELECT * FROM card where id_klient='$id';";
		$result = $con->con->query($query);
						if ($result->num_rows > 0) {
									$row = $result->fetch_assoc();
									return $row;
						}else{
									echo "Record not found";
						}
	
	}
	public function find_by_name_pass($fname, $pass){
	
		$con = new Connection();
		$p = substr($pass,0,20);
		$query="SELECT * FROM klient where fname='$fname' AND password_klient='$p'";
		$result = $con->con->query($query);
						if ($result->num_rows > 0) {
									$row = $result->fetch_assoc();
									return $row;
						}else{
									echo "Record not found";
						}
	
}
public function displyaRecordById($id)
	{
					$con = new Connection();
					$query = "SELECT * FROM klient WHERE id = '$id'";
					$result = $con->con->query($query);
					if ($result->num_rows > 0) {
								$row = $result->fetch_assoc();
								return $row;
					}else{
								echo "Record not found";
					}
	}
	public function displyaRecordByEmail($email)
	{		$con = new Connection();
			$query = "SELECT * FROM user WHERE email = '$email'";
			$result = $con->con->query($query);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
					return $row;
			}else{
					echo "Record not found";
			}
	}
	public function displyaTypeByKlient($id)
	{		$con = new Connection();
			$query = "SELECT benefits.id, benefits.type_benefits  FROM benefits INNER JOIN benefits_of_klient ON benefits.id=benefits_of_klient.id_benefits AND benefits_of_klient.id_klient = '$id'";
			$result = $con->con->query($query);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
					return $row;
			}else{
					echo "Record not found";
			}
	}
	public function displyaTypeIdByTitle($name)
	{		$con = new Connection();
			$query = "SELECT id FROM benefits WHERE type_benefits = '$name'";
			$result = $con->con->query($query);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
					return $row;
			}else{
					echo "Record not found";
			}
	}
	public function displyPhotoByKlient($id)
	{		$con = new Connection();
			$query = "SELECT photo FROM benefits_of_klient Where id_klient = '$id'";
			$result = $con->con->query($query);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
					return $row;
			}else{
					echo "Record not found";
			}
	}
}
class TProfileRepository implements TableRepository{
	public function login($login, $pass, $remember){
		$find = new TUserFinder();
		$us = new TUserViewer();
		$user = $us->displayAll();
		/*$query="SELECT * FROM users";
		$result = $con->con->query($query);*/
		$is_find=false;
		foreach($user as $u){
				if($u['fname']==$login && substr($u['password_klient'],0,20)==substr(md5($pass),0,20)){
				
					$is_find= true;
				}
	}
		if($is_find){
			if($remember){
				setcookie('login', $login,time()+360*27, '/', null, false,true);
				setcookie('password', substr(md5($pass),0,20), time()+360*27, '/', null, false,true);
				
				
				
			}
				$_SESSION['user']['login']=$login;
				$_SESSION['user']['password']=substr(md5($pass),0,20);
					
			
			//$_SESSION['user']=['login'=>$login,'password'=>substr($pass,0,10),'role_of_user'=>$row['role_of_user'], 'is_approve'=>$row['is_approve'],'current_d'=>$cur, 'last_d'=>$las, 'count'=>$cou];
			return true;}
		
	//}
	return false;

}
public function logout(){
	setcookie('login','',time()-360*27, '/', null, false,true);
	setcookie('password','',time()-360*27, '/', null, false,true);
	unset($_SESSION['user']['login']);
	
	session_destroy();
	header("Location: login.php");
	die;

}
	public function insert($post, $session){
		$con = new Connection();
		$fname = $con->con->real_escape_string(htmlentities($post['registerName']));
		$lname = $con->con->real_escape_string(htmlentities($post['registerLastName']));
		$surname = $con->con->real_escape_string(htmlentities($post['registerUsername']));
		$snils = $con->con->real_escape_string(htmlentities($post['registerSnils']));
		$polis = $con->con->real_escape_string(htmlentities($post['registerOMS']));
		$email = $con->con->real_escape_string(htmlentities($post['registerEmail']));
		$data = $con->con->real_escape_string(htmlentities($post['registerDate']));
		$phone = $con->con->real_escape_string(htmlentities($post['registerPhone']));
		$number = $con->con->real_escape_string(htmlentities($post['registerSeria']));
		$seria = $con->con->real_escape_string(htmlentities($post['registerNumber']));
		$type = $con->con->real_escape_string(htmlentities($post['type']));
		$photo = addslashes(file_get_contents($_FILES['file_dock']['tmp_name']));
		$password = $con->con->real_escape_string(md5(htmlentities($post['registerPassword'])));
		if(!isset($email) || empty($email)){
				$email="";
		}
		if(!isset($snils) || empty($snils)){
			$snils="";
	}
	if(!isset($polis) || empty($polis)){
		$polis="";
}
$find = new TUserFinder();
		$is_find = $find->find_by_email_pass($snils, $polis);
		if($is_find){
			header("Location:login.php?er=contains");
		}else{
			$code = substr(str_shuffle(str_repeat($x='0123456789',16)),0,16);
			$csv = substr(str_shuffle(str_repeat($x='0123456789',3)),0,3);
			
			$day = substr($data,2);
			$year=substr($data,6,9)+5;
		$query="INSERT INTO klient(fname,lname,surname,birtdate,seria, num,phone,email, snils, oms, password_klient) VALUES('$fname','$lname','$surname','$data','$seria','$number','$phone','$email',  '$snils','$polis','$password');";
					
			$sql = $con->con->query($query);
					$obj = new TUserFinder();
			$person = $obj->find_by_name_pass($fname, $password);
			$id = $person['id'];
			
			$query1 = "INSERT INTO card(id_klient,num,day_k,year_k,csv) VALUES('$id','$code','$day', '$year','$csv');";
					
			$sql1 = $con->con->query($query1);
			$t = new TUserFinder();
			
			$query2 = "INSERT INTO benefits_of_klient (id_klient, id_benefits,photo) VALUES('$id','$type','$photo');";
			$sql2 = $con->con->query($query2);
			if ($sql==true && $sql1==true && $sql2==true) {
					header("Location:login.php");
			}else{
					echo "Registration failed try again!";
			}	}
	}
	
public function update($post, $session){
	$con = new Connection();
	$fname = $con->con->real_escape_string(htmlentities($post['updateName']));
		$lname = $con->con->real_escape_string(htmlentities($post['updateLastName']));
		$surname = $con->con->real_escape_string(htmlentities($post['updateUsername']));
		$snils = $con->con->real_escape_string(htmlentities($post['updateSnils']));
		$polis = $con->con->real_escape_string(htmlentities($post['updateOMS']));
		$email = $con->con->real_escape_string(htmlentities($post['updateEmail']));
		$data = $con->con->real_escape_string(date(htmlentities($post['updateDate'])));
		$phone = $con->con->real_escape_string(htmlentities($post['updatePhone']));
		$number = $con->con->real_escape_string(htmlentities($post['updateNumber']));
		$seria = $con->con->real_escape_string(htmlentities($post['updateSeria']));
		$type = $con->con->real_escape_string(htmlentities($post['updatetype']));
		$id = $con->con->real_escape_string(htmlentities($post['id_klient']));
		
		$password = $con->con->real_escape_string(md5(htmlentities($post['updatePassword'])));
		
		
		
			$query="UPDATE klient SET fname='$fname', lname='$lname', surname='$surname', snils='$snils',oms='$polis',email='$email',birtdate='$data',phone='$phone', num='$number', seria='$seria' where id='$id';";
			$sql = $con->con->query($query);
					
			
			$query2 = "UPDATE benefits_of_klient SET id_benefits='$type' where id_klient='$id';";
			$sql2 = $con->con->query($query2);
		
		if ($sql==true && $sql2==true) {
			header("Location:profile.php?status=success");
	}else{
			echo "Registration failed try again!";
	}}

	public function delete($id, $session){
		$con = new Connection();
		$query = "DELETE FROM klient WHERE id = '$id'";
$sql = $con->con->query($query);

			header("Location:login.php");

}
}

class User{
	private $login;
	private $pass;
	private $remember;
	private $session;
	public function __construct($log,$pas,$rem,$sess)
	{
		$this->login = $log;
		$this->pass = $pas;
		$this->remember=$rem;
		$this->session=$sess;
	}
	public function login(){
		$find = new TUserFinder();
		$is_find = $find->find_by_email_pass($this->login, $this->pass);
		echo $is_find;
		if($is_find){
			if($this->remember){
				setcookie('login', $this->login,time()+360*27, '/', null, false,true);
				setcookie('password', substr($this->pass,0,20), time()+360*27, '/', null, false,true);
				
				
				
			}
				$_SESSION['user']['login']=$this->login;
				$_SESSION['user']['password']=substr($this->pass,0,20);
					
			
			//$_SESSION['user']=['login'=>$login,'password'=>substr($pass,0,10),'role_of_user'=>$row['role_of_user'], 'is_approve'=>$row['is_approve'],'current_d'=>$cur, 'last_d'=>$las, 'count'=>$cou];
			return true;}
		
	//}
	return false;

}
	public function logout(){
	setcookie('login','',time()-360*27, '/', null, false,true);
	setcookie('password','',time()-360*27, '/', null, false,true);
	
	$this->session->delSession('user','login');
	$this->session->delSession('user','password');
	$this->login=Null;
	$this->pass=Null;
	$this->remember=Null;
	session_destroy();
}
}
class Session {
	private $name;
	private $val;
 
	public function __construct() {
			session_start();
	}
 
	public function setSessionmain($name, $val) {
			$this->name = $name;
			$this->val = $val;
			return $_SESSION[$this->name] = $this->val;
	}
	public function setSessiondop($name_1, $name_2, $val) {
		$this->name = $name_1;
		$this->val = $val;
		return $_SESSION[$this->name][$name_2] = $this->val;
}
 
	public function getSessionNamemain($name) {
		if($this->checkSessionmain($name))
			return $_SESSION[$name];
	}
	public function getSessionNamedop($name, $role) {
		if($this->checkSessiondop($name,$role))
			return $_SESSION[$name][$role];
}
 
	public function checkSessionmain($name) {
		if(empty($_SESSION[$name])){
			return false;
		}
		else return true;
	}
	public function checkSessiondop($name, $role){
		if(empty($_SESSION[$name][$role])){
			return false;
		}
		else return true;
		
	}
 
	public function delSession($name_1, $name_2) {
			 unset($_SESSION[$name_1][$name_2]);
	}
}

class Flash {
	private $saveSession;
 
	public function __construct($session) {
			$this->saveSession = $session;
	}
 
	public function setMessage($id, $mess) {
			$this->saveSession->setSessionmain($id, $mess);
	}
 
	public function getMessage($name) {
			if($this->saveSession->checkSessionmain($name)) {
					return $this->saveSession->getSessionNamemain($name);
			}
	}
}

?>