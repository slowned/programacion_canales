<?php

class SessionController extends BaseController
{
	public function create($request){
		return $this->render('login/login');
	}

	public function store($request){
		$username = $request['username'];
		$password = $request['password'];

    try {
      if(isset($username) && isset($password)){
        $user = Usuario::where(compact('username','password'));
        if($user){
                $_SESSION['user'] = $user;
        } else {
           throw new Exception('usuario o contrasenia invalida');
        }
        header('Location: backend.php?controller=BaseController&action=backend');
          }
    } catch (Exeption $e)  {
        $error = $e->getMessage();
         echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    } finally {
        return $this->render('login/login', compact('error'));
    } 



    # $user = Usuario::where(compact('username','password'));


		# if($user){
    #         $_SESSION['user'] = $user;
    # } else {
    #     $error = 'usuario o contrasenia invalida';
    #     return $this->render('login/login', compact('error'));
    # }
		# header('Location: backend.php?controller=BaseController&action=backend');
	}


	public function destroy($request)
	{
		unset($_SESSION['user']);
		session_destroy();
		header('Location: backend.php');
	}
}
?>
