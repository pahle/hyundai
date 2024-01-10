<?php 
namespace App\Controllers;  
use App\Models\UserModel;
  
class SigninController extends BaseController
{
    public function index()
    {
        helper(['form']);
        if(session()->get('isLoggedIn')){
            return redirect()->to(base_url().'admin');
        }
        return view('signin');
    } 
  
    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            // $authenticatePassword = password_verify($password, $pass);

            if($password == $pass){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url().'admin');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to(base_url().'signin');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to(base_url().'signin');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url().'signin');
    }
}