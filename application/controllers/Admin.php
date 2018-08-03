<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('users_model');
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url'));
	}

	public function _remap($method, $params = array())
    {
        if (method_exists($this, $method))
        {
            if($this->session->userdata('rol')!='Administrador') redirect(base_url());
            else
                return call_user_func_array(array($this, $method), $params);
        }
        show_404();
    }

    public function index()
    {
        $js[]='js/insert/users.js';
        $css[]='libs/select2/select2.css';
        $css[]='libs/select2/select2-metronic.css';
		$js[]='libs/select2/select2.min.js';
		$data['js']=$js;
		$data['css']=$css;
        $data['users']=$this->users_model->getAll();
        $data['rol']=$this->users_model->getAllRol();
        $data['body']='admin/users';
		$this->load->view('template/template',$data);
    }

    public function addUser()
    {
        $this->form_validation->set_rules('user','Usuario','required');
        $this->form_validation->set_rules('pass','Contraseña','required|min_length[5]');
        $this->form_validation->set_rules('pass2','Confirmación','required|min_length[5]|matches[pass]');
        $this->form_validation->set_rules('name','Nombre','required');

        if($this->form_validation->run()==true){
            $user=$this->input->post('user');
            $pass=$this->input->post('pass2');
            $name=$this->input->post('name');
            $rol=$this->input->post('rol');
            $this->users_model->addUser($user,$pass,$name,$rol);
            echo json_encode(['success'=>true,'message'=>'Usuario insertado']);
        }else{
            echo json_encode(['success'=>false,'errors'=>$this->form_validation->error_array()]);
        }
    }

    public function editUser()
    {
        $this->form_validation->set_rules('userE','Usuario','required');
        $this->form_validation->set_rules('passE','Contraseña','min_length[5]');
        $this->form_validation->set_rules('pass2E','Confirmación','min_length[5]|matches[passE]');
        $this->form_validation->set_rules('nameE','Nombre','required');


        if($this->form_validation->run()==true){

            $id=$this->input->post('idedit');
            $user=$this->input->post('userE');
            $pass=$this->input->post('pass2E');
            $name=$this->input->post('nameE');
            $rol=$this->input->post('rol');

            $this->users_model->editUser($id,$user,$pass,$name,$rol);

            echo json_encode(['success'=>true,'message'=>'Usuario actualizado','id'=>$id,'name'=>$name,'user'=>$user]);

        }else{

            echo json_encode(['success'=>false,'errors'=>$this->form_validation->error_array()]);

        }
    }

    public function delUser($id)
    {
        if($id)
        {
            if($this->users_model->deleteUser($id))
                echo json_encode(['success'=>true,'message'=>'Usuario Eliminado correctamente','id'=>$id]);
            else
                echo json_encode(['success'=>false,'message'=>'este usuario, no se puede eliminar','id'=>$id]);
        }
        else
            echo json_encode(['success'=>false,'message'=>'Error al ejecutar la operación','id'=>$id]);
    }
  
}