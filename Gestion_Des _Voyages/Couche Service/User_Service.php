<?php
 /**
 * 
 */

 class User_Service
 {
 	private $db;
 
 	function __construct()
 	{
 		session_start();
 		$c = new Connexion();
 		$this->db = $c->getdb();
 	}
 	public function register($user)
    {
       try
       {
           $new_password = password_hash($user->getpass(), PASSWORD_DEFAULT);
   
           $stmt = $this->db->prepare("INSERT INTO users(user_name,user_email,user_pass) VALUES(:uname, :umail, :upass)");
           $stmt->bindparam(":uname", $user->getnom());
           $stmt->bindparam(":umail", $user->getemail());
           $stmt->bindparam(":upass", $new_password);            
           $stmt->execute(); 
   
           if ($stmt->rowCount()>0) {
            	return true;
            }
            return false;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    public function login($user)
    {
       try
       {
       	var_dump($user);
          $stmt = $this->db->prepare("SELECT * FROM users WHERE user_email=? LIMIT 1");
          $stmt->execute(array($user->getemail()));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($user->getpass(), $userRow['user_pass']))
             {
                $_SESSION['user_session'] = $userRow['user_id'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
      return false;
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }

 }
?>