<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        $this->load->model('users_model');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }

    public function index()
    {
        if($this->session->userdata('id')!='')
        {
            return  redirect(base_url().'main');
        }

        if(!empty($_POST))
        {
            $sec=$this->input->post('token');
            if($sec==$this->session->userdata('token'))
            {
                $username = $this->input->post('username');
                $pass = $this->input->post('password');

                $user = $this->users_model->login($username, $pass);
                if ($user) {
                    $data = array(
                        'loggued' => TRUE,
                        'id' => $user->id,
                        'user' => $user->username,
                        'rol' => $user->rol,
                        'name' => $user->nombre,
                        'id_rol' => $user->id_rol
                    );
                    $this->session->set_userdata($data);
                    return redirect(base_url().'main');
                }
                else
                    $data['username'] = $username;
            }
            else{
                $this->session->set_flashdata('error_user','Envío de formulario incorrecto, formulario no válido');
            }
        }

        $token=$this->token();
        $data['token']=$token;
        $this->load->view('pages/login',$data);
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    private function token()
    {
        $token = md5(uniqid(rand(),true));
        $this->session->set_userdata('token',$token);
        return $token;
    }
}