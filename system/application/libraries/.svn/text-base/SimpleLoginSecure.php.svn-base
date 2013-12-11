<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('phpass-0.1/PasswordHash.php');

define('PHPASS_HASH_STRENGTH', 8);
define('PHPASS_HASH_PORTABLE', false);

/**
 * SimpleLoginSecure Class
 *
 * Makes authentication simple and secure.
 *
 * Simplelogin expects the following database setup. If you are not using 
 * this setup you may need to do some tweaking.
 *   
 * 
 *   CREATE TABLE `users` (
 *     `user_id` int(10) unsigned NOT NULL auto_increment,
 *     `user_email` varchar(255) NOT NULL default '',
 *     `user_pass` varchar(60) NOT NULL default '',
 *     `user_date` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'Creation date',
 *     `user_modified` datetime NOT NULL default '0000-00-00 00:00:00',
 *     `user_last_login` datetime NULL default NULL,
 *     PRIMARY KEY  (`user_id`),
 *     UNIQUE KEY `user_email` (`user_email`),
 *   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 * 
 * @package   SimpleLoginSecure
 * @version   1.0.1
 * @author    Alex Dunae, Dialect <alex[at]dialect.ca>
 * @copyright Copyright (c) 2008, Alex Dunae
 * @license   http://www.gnu.org/licenses/gpl-3.0.txt
 * @link      http://dialect.ca/code/ci-simple-login-secure/
 */
class SimpleLoginSecure
{
	var $CI;
	var $user_table = 'users';

	/**
	 * Create a user account
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function create($user_email = '', $user_pass = '', $auto_login = true) 
	{
		$this->CI =& get_instance();
		


		//Make sure account info was sent
		if($user_email == '' OR $user_pass == '') {
			return false;
		}
		
		//Check against user table
		$this->CI->db->where('user_email', $user_email); 
		$query = $this->CI->db->getwhere($this->user_table);
		
		if ($query->num_rows() > 0) //user_email already exists
			return false;

		//Hash user_pass using phpass
		$hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
		$user_pass_hashed = $hasher->HashPassword($user_pass);

		//Insert account into the database
		$data = array(
					'user_email' => $user_email,
					'user_name' => 'Аноним',
					'user_pass' => $user_pass_hashed,
					'user_date' => date('c'),
					'user_modified' => date('c'),
					'user_role' => 'user'
				);

		$this->CI->db->set($data); 

		if(!$this->CI->db->insert($this->user_table)) //There was a problem!
			return false;
				
		if($auto_login)
			$this->login($user_email, $user_pass);
		
		return true;
	}
	
	
	function generate_password($password_in){
		
		$hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
		return $hasher->HashPassword($password_in);
		
	}

	/**
	 * Login and sets session variables
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function login($user_email = '', $user_pass = '') 
	{
		$this->CI =& get_instance();

		if($user_email == '' OR $user_pass == '')
			return false;


		//Check if already logged in
		if($this->CI->session->userdata('user_email') == $user_email)
			return true;
		
		
		//Check against user table
		$this->CI->db->where('user_email', $user_email); 
		$query = $this->CI->db->getwhere($this->user_table);

		
		if ($query->num_rows() > 0) 
		{
			$user_data = $query->row_array(); 

			$hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);

			if(!$hasher->CheckPassword($user_pass, $user_data['user_pass']))
				return false;

			//Destroy old session
			$this->CI->session->sess_destroy();
			
			//Create a fresh, brand new session
			$this->CI->session->sess_create();
			
			$ip = $this->CI->input->ip_address();

			$this->CI->db->simple_query('UPDATE ' . $this->user_table  . ' SET user_last_login = NOW(), user_last_login_ip = "'.$ip.'"  WHERE user_id = ' . $user_data['user_id']);

			//Set session data
			unset($user_data['user_pass']);
			$user_data['user'] = $user_data['user_email']; // for compatibility with Simplelogin
			$user_data['logged_in'] = true;
			$this->CI->session->set_userdata($user_data);
			
			return true;
		} 
		else 
		{
			return false;
		}	

	}
	
	
	function check_user_password($user_id, $user_password){
		
		$user = $this->CI->db->where('user_id', $user_id)->get('users')->row_array();

		$hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
		if(!$hasher->CheckPassword($user_password, $user['user_pass'])) {
			return false;
		} else {
			return true;
		}
		
	}
	
	function check_user_exist($email){
		
		$this->CI =& get_instance();
		
		if ($this->CI->db->where('user_email', $email)->get('users')->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Logout user
	 *
	 * @access	public
	 * @return	void
	 */
	function logout() {
		$this->CI =& get_instance();		

		$this->CI->session->sess_destroy();
	}

	/**
	 * Delete user
	 *
	 * @access	public
	 * @param integer
	 * @return	bool
	 */
	function delete($user_id) 
	{
		$this->CI =& get_instance();
		
		if(!is_numeric($user_id))
			return false;			

		return $this->CI->db->delete($this->user_table, array('user_id' => $user_id));
	}
	
	
	
	function retrive_activation_key($user_id, $email, $key) {
		$this->CI =& get_instance();
		
		$this->CI->load->library('email');
					
		$this->CI->email->from('no-reply@nextonmarket.com.ua', 'NextOnMarket');
		$this->CI->email->to($email);
					
		$this->CI->email->subject('Активация аккаунта NextOnMarket');
		$this->CI->email->message('Здравствуйте!

Это письмо отправлено с сайта '.base_url().'

Вы получили это письмо, так как этот e-mail адрес был использован при регистрации на сайте http://www.nextonmarket.com.ua
Если Вы не регистрировались на этом сайте, просто проигнорируйте это письмо и удалите его. Вы больше не получите такого письма.

------------------------------------------------
Инструкция по активации
------------------------------------------------

Благодарим Вас за регистрацию.
Мы требуем от Вас подтверждения Вашей регистрации, для проверки того, что введённый Вами e-mail адрес - реальный.
Это требуется для защиты от нежелательных злоупотреблений и спама.

Для активации Вашего аккаунта, зайдите по следующей ссылке:

'.base_url().'advertiser/activate/'.$user_id.'/'.$key.'

Если и при этих действиях ничего не получилось - напишите нам письмо на адрес support@nextonmarket.com.ua

С уважением,

Администрация NextOnMarket');
					
		$this->CI->email->send();
		
	}
	
	
	function restore_pasword($user_id, $email, $key){
		
		$this->CI =& get_instance();
		
		$this->CI->load->library('email');
					
		$this->CI->email->from('no-reply@nextonmarket.com.ua', 'NextOnMarket');
		$this->CI->email->to($email);
					
		
		$this->CI->email->subject('Восстановление пароля NextOnMarket');
					
		$this->CI->email->message('Здравствуйте!

Это письмо отправлено с сайта '.base_url().'

Вы получили это письмо, так как на этот e-mail адрес был запрошен новый пароль.
Если Вы не регистрировались на этом сайте, просто проигнорируйте это письмо и удалите его. Вы больше не получите такого письма.

------------------------------------------------
Инструкция по восстановлению пароля
------------------------------------------------

1) Для получения нового пароля зайдите по следующей ссылке:
'.base_url().'advertiser/restore/'.$user_id.'/'.$key.'

2) Снова проверьте почту - Вам должно быть доставлено письмо с новым паролем.



Если и при этих действиях ничего не получилось - напишите нам письмо на адрес support@nextonmarket.com.ua

С уважением,

Администрация NextOnMarket');


		$this->CI->email->send();
	}
	
	
	function restore_password_send($email, $password){
		
		$this->CI =& get_instance();
		
		$this->CI->load->library('email');
					
		$this->CI->email->from('no-reply@nextonmarket.com.ua', 'NextOnMarket');
		$this->CI->email->to($email);
					
		
		$this->CI->email->subject('Новый пароль NextOnMarket');
					
		$this->CI->email->message('Здравствуйте!

Это письмо отправлено с сайта '.base_url().'

Вы получили это письмо, так как на этот e-mail адрес был запрошен новый пароль.

Ваш логин: '.$email.'
Ваш пароль: '.$password.'

С уважением,

Администрация NextOnMarket');


		$this->CI->email->send();
	}
	
}
?>
