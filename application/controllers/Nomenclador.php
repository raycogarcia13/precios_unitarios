<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nomenclador extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('nomenclador_model');
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
        $data['body']='pages/nomencladores';
		$this->load->view('template/template',$data);
    }

    public function mainum()
    {
        $js[]='js/insert/addUm.js';
        $data['js']=$js;
        $data['um']=$this->nomenclador_model->getUm();

        $data['body']='nomencladores/umedidas';
		$this->load->view('template/template',$data);
    }

    public function addUm()
    {
        $this->form_validation->set_rules('name','Unidad de Medida','required');

		if($this->form_validation->run()==true)
		{
            $name=$this->input->post('name');
			
			$id=$this->nomenclador_model->addUm($name);

            echo json_encode(['success'=>true,'message'=>'Unidad de Medida Insertada','id'=>$id]);

        }else{
            echo json_encode(['success'=>false,'message'=>'Tiene errores en el formulario','errors'=>$this->form_validation->error_array()]);

        }
    }

    public function delUm($id)
    {
        if($id)
        {
            if($this->nomenclador_model->delUm($id))
                echo json_encode(['success'=>true,'message'=>'Unidad de Medida Eliminada correctamente','id'=>$id]);
            else
                echo json_encode(['success'=>false,'message'=>'Está en uso, no se puede eliminar','id'=>$id]);
        }
        else
            echo json_encode(['success'=>false,'message'=>'Error al ejecutar la operación','id'=>$id]);
    }

    public function editUm()
    {
        if($this->input->post('idedit'))
        {
            $id=$this->input->post('idedit');
            $um=$this->input->post('nameEdit');

            $this->nomenclador_model->editUm($id,$um);
            echo json_encode(['success'=>true,'data'=>$um,'message'=>'Unidad de Medida Actualizada correctamente','id'=>$id]);
        }
    }

    public function grupo()
    {
        $js[]='js/insert/addGrupo.js';
        $data['js']=$js;
        $data['grupos']=$this->nomenclador_model->getGrupos();

        $data['body']='nomencladores/grupos';
		$this->load->view('template/template',$data);
    }

    public function addGrupo()
    {
        $this->form_validation->set_rules('name','Actividad Gruesa','required');

		if($this->form_validation->run()==true)
		{
            $name=$this->input->post('name');
			
			$id=$this->nomenclador_model->addGrupo($name);

            echo json_encode(['success'=>true,'message'=>'Actividad Gruesa Insertada','id'=>$id]);

        }else{
            echo json_encode(['success'=>false,'message'=>'Tiene errores en el formulario','errors'=>$this->form_validation->error_array()]);

        }
    }

    public function delGrupo($id)
    {
        if($id)
        {
            if($this->nomenclador_model->delGrupo($id))
                echo json_encode(['success'=>true,'message'=>'Actividad Gruesa Eliminada correctamente','id'=>$id]);
            else
                echo json_encode(['success'=>false,'message'=>'Está en uso, no se puede eliminar','id'=>$id]);
        }
        else
            echo json_encode(['success'=>false,'message'=>'Error al ejecutar la operación','id'=>$id]);
    }

    public function editGrupo()
    {
        if($this->input->post('idedit'))
        {
            $id=$this->input->post('idedit');
            $um=$this->input->post('nameEdit');

            $this->nomenclador_model->editGrupo($id,$um);
            echo json_encode(['success'=>true,'data'=>$um,'message'=>'Actividad Gruesa Actualizada correctamente','id'=>$id]);
        }
    }
  
}