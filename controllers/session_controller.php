<?php

class SessionController extends BaseController
{
	public function create($request){
		return $this->render('login/login');
	}

	public function store($request){
		$username = $request['username'];
		$password = $request['password'];

		$user = Usuario::where(array(
			'username' => $username,
			'password' => $password,
		));


		if($user){
            $_SESSION['user'] = $user;
    } else {
        $error = 'usuario o contrasenia invalida';
        return $this->render('login/login', compact('error'));
    }
		header('Location: backend.php?controller=BaseController&action=home');
	}


	public function destroy($request)
	{
		unset($_SESSION['user']);
		session_destroy();
		header('Location: backend.php');
	}
}
?>
