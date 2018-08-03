<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('nomenclador_model');
		$this->load->model('actividad_model');
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
		$data['body']='pages/main';
		$this->load->view('template/template',$data);
	}

	public function actividades()
	{
		$css[]='libs/select2/select2.css';
        $css[]='libs/select2/select2-metronic.css';
		$css[]='libs/data-tables/DT_bootstrap.css';
		$js[]='libs/select2/select2.min.js';
        $js[]='libs/data-tables/jquery.dataTables.js';
        $js[]='libs/data-tables/DT_bootstrap.js';
		$js[]='js/datatables.js';
        $data['js']=$js;
		$data['css']=$css;
		
		$acts=$this->actividad_model->getAllActividad();

		for($i=0;$i<count($acts);$i++)
		{
				$pu=$this->actividad_model->suma($acts[$i]['id'],1)->total;
				$obra=$this->actividad_model->suma($acts[$i]['id'],2)->total;
				$tool=$this->actividad_model->suma($acts[$i]['id'],3)->total;
			$acts[$i]['pu']=$pu;
			$acts[$i]['obra']=$obra;
			$acts[$i]['tool']=$tool;
			$acts[$i]['total']=$pu+$obra+$tool;
		}

		$data['acts']=$acts;
		
		$data['body']='pages/actividades';
		$this->load->view('template/template',$data);
	}

	public function insertActividad()
	{
		$css[]='libs/select2/select2.css';
        $css[]='libs/select2/select2-metronic.css';
		$js[]='libs/select2/select2.min.js';
		$js[]='js/insert/addAct.js';
		$data['js']=$js;
		$data['css']=$css;
		$data['grupos']=$this->nomenclador_model->getGrupos();
		$data['um']=$this->nomenclador_model->getUm();
		$data['body']='pages/insertAct';
		$this->load->view('template/template',$data);
	}

	public function addActiv()
	{
		$this->form_validation->set_rules('codigo','Código','required');
		$this->form_validation->set_rules('name','Actividad','required');

		if($this->form_validation->run()==true)
		{
            $grupo=$this->input->post('grupo');
            $name=$this->input->post('name');
            $cod=$this->input->post('codigo');
            $um=$this->input->post('um');
			
			$id=$this->actividad_model->addAct($grupo,$cod,$name,$um);

            echo json_encode(['success'=>true,'message'=>'Actividad Insertada Correctamente','id'=>$id]);

        }else{

            echo json_encode(['success'=>false,'message'=>'Tiene errores en el formulario','errors'=>$this->form_validation->error_array()]);

        }

	}
	public function editActiv()
	{
		$this->form_validation->set_rules('codigo','Código','required');
		$this->form_validation->set_rules('name','Actividad','required');

		if($this->form_validation->run()==true)
		{
            $grupo=$this->input->post('grupo');
            $name=$this->input->post('name');
            $cod=$this->input->post('codigo');
            $um=$this->input->post('um');
            $id=$this->input->post('id');
			
			$this->actividad_model->editAct($id,$grupo,$cod,$name,$um);

            echo json_encode(['success'=>true,'message'=>'Actividad Actualizada Correctamente','id'=>$id]);

        }else{

            echo json_encode(['success'=>false,'message'=>'Tiene errores en el formulario','errors'=>$this->form_validation->error_array()]);

        }

	}

	public function addDesc($id)
	{
		$descr=$this->actividad_model->getDescription($id);
		$mat=array();
		$obra=array();
		$tools=array();
		$total=0;
		foreach($descr as $item)
		{
			$total+=$item['total'];
			if($item['renglon']=="Materiales")
				$mat[]=$item;
			else if($item['renglon']=="Mano de Obra")
				$obra[]=$item;	
			else
				$tools[]=$item;	
		}
		$js[]='js/insert/addDesc.js';
		$css[]='libs/select2/select2.css';
        $css[]='libs/select2/select2-metronic.css';
		$js[]='libs/select2/select2.min.js';
		$data['js']=$js;
		$data['css']=$css;

		$data['total']=$total;
		$data['mat']=$mat;
		$data['obra']=$obra;
		$data['tools']=$tools;
		$data['desc']=$descr;
		$data['um']=$this->nomenclador_model->getUm();
		$data['act']=$this->actividad_model->getActividadById($id);
		$data['renglones']=$this->nomenclador_model->getRenglones();
		$data['body']='pages/insertDescr';
		$this->load->view('template/template',$data);
	}

	public function addDescrAjax()
	{
		$this->form_validation->set_rules('reng','Renglón','required');
		$this->form_validation->set_rules('name','Descripción','required');
		$this->form_validation->set_rules('rend','Rendimiento','required');
		$this->form_validation->set_rules('pu','Precio Unitario','required');
		$this->form_validation->set_rules('total','Total','required');

		if($this->form_validation->run()==true)
		{
            $act=$this->input->post('idAct');
            $reng=$this->input->post('reng');
            $name=$this->input->post('name');
            $um=$this->input->post('um');
            $rend=$this->input->post('rend');
            $pu=$this->input->post('pu');
            $total=$this->input->post('total');
			
			$id=$this->actividad_model->addDesc($act,$reng,$name,$um,$rend,$pu,$total);

            echo json_encode(['success'=>true,'message'=>'Descripción Insertada','id'=>$id]);

        }else{
            echo json_encode(['success'=>false,'message'=>'Tiene errores en el formulario','errors'=>$this->form_validation->error_array()]);

        }
	}

	public function editDescrAjax()
	{
		$this->form_validation->set_rules('reng','Renglón','required');
		$this->form_validation->set_rules('name','Descripción','required');
		$this->form_validation->set_rules('rend','Rendimiento','required');
		$this->form_validation->set_rules('pu','Precio Unitario','required');
		$this->form_validation->set_rules('total','Total','required');

		if($this->form_validation->run()==true)
		{
            $id=$this->input->post('id');
            $reng=$this->input->post('reng');
            $name=$this->input->post('name');
            $um=$this->input->post('um');
            $rend=$this->input->post('rend');
            $pu=$this->input->post('pu');
            $total=$this->input->post('total');
			
			$this->actividad_model->editDesc($id,$reng,$name,$um,$rend,$pu,$total);

            echo json_encode(['success'=>true,'message'=>'Descripción Actualizada']);

        }else{
            echo json_encode(['success'=>false,'message'=>'Tiene errores en el formulario','errors'=>$this->form_validation->error_array()]);

        }
	}

	public function detalles($id)
	{
		$descr=$this->actividad_model->getDescription($id);
		$mat=array();
		$obra=array();
		$tools=array();
		$total=0;
		foreach($descr as $item)
		{
			$total+=$item['total'];
			if($item['renglon']=="Materiales")
				$mat[]=$item;
			else if($item['renglon']=="Mano de Obra")
				$obra[]=$item;	
			else
				$tools[]=$item;	
		}

		$data['total']=$total;
		$data['mat']=$mat;
		$data['obra']=$obra;
		$data['tools']=$tools;
		$data['desc']=$descr;
		$data['act']=$this->actividad_model->getActividadById($id);
		$data['body']='pages/detalles';
		$this->load->view('template/template',$data);
	}

	public function editarActividad($id)
	{
		$descr=$this->actividad_model->getDescription($id);
		$mat=array();
		$obra=array();
		$tools=array();
		$total=0;
		foreach($descr as $item)
		{
			$total+=$item['total'];
			if($item['renglon']=="Materiales")
				$mat[]=$item;
			else if($item['renglon']=="Mano de Obra")
				$obra[]=$item;	
			else
				$tools[]=$item;	
		}

		$js[]='js/actividades.js';
		$data['js']=$js;
		$data['total']=$total;
		$data['mat']=$mat;
		$data['obra']=$obra;
		$data['tools']=$tools;
		$data['desc']=$descr;
		$data['act']=$this->actividad_model->getActividadById($id);
		$data['body']='pages/editarAct';
		$this->load->view('template/template',$data);
	}

	public function deleteDescr($id)
	{
		$this->actividad_model->deleteDescr($id);
		echo json_encode(['success'=>true,'message'=>'Descripción Eliminada Correctamente']);
	}

	public function editAct($id)
	{
		$css[]='libs/select2/select2.css';
        $css[]='libs/select2/select2-metronic.css';
		$js[]='libs/select2/select2.min.js';
		$js[]='js/insert/editAct.js';
		$data['js']=$js;
		$data['css']=$css;
		$data['act']=$this->actividad_model->getActividadById($id);
		$data['grupos']=$this->nomenclador_model->getGrupos();
		$data['um']=$this->nomenclador_model->getUm();
		$data['body']='pages/editAct';
		$this->load->view('template/template',$data);	
	}

	public function editDescr($id)
	{
		$js[]='js/insert/editDescr.js';
		$css[]='libs/select2/select2.css';
        $css[]='libs/select2/select2-metronic.css';
		$js[]='libs/select2/select2.min.js';
		$data['js']=$js;
		$data['css']=$css;

		$data['descr']=$this->actividad_model->getDescripcion($id);
		$data['um']=$this->nomenclador_model->getUm();
		$data['renglones']=$this->nomenclador_model->getRenglones();
		$data['body']='pages/editDescr';
		$this->load->view('template/template',$data);
	}

	public function deleteActividad($id)
	{
		if($this->actividad_model->deleteActividad($id))
			echo json_encode(['success'=>true,'message'=>'Actividad Eliminada correctamene','id'=>$id]);
		else
			echo json_encode(['success'=>false,'message'=>'Error al eliminar','id'=>$id]);

	}

	public function pdf($id)
    {
    	$descr=$this->actividad_model->getDescription($id);
		$mat=array();
		$obra=array();
		$tools=array();
		$total=0;
		foreach($descr as $item)
		{
			$total+=$item['total'];
			if($item['renglon']=="Materiales")
				$mat[]=$item;
			else if($item['renglon']=="Mano de Obra")
				$obra[]=$item;	
			else
				$tools[]=$item;	
		}
		$act=$this->actividad_model->getActividadById($id);

       	$this->load->library('Pdf');

       	// STANDARD
       	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('SCPU System');
		$pdf->SetTitle('Detalles Actividad');
		$pdf->SetSubject($act->actividad);
		$pdf->SetHeaderData('logo.png', 30, PDF_HEADER_TITLE, '"'.$act->actividad.'"'."\n".date('d-m-Y'));
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		//FIN STADARD 
		$pdf->SetFont('dejavusans', '', 9);
		$pdf->AddPage();
// head de la actividad
		$head='<table style="width:600">';
		$head.='<tbody>';
		$head.='<tr><td colspan="3" style="text-align:center"><b>'.$act->actividad.'</b></td></tr>';
		$head.='<tr>
					<td colspan="2" style="text-align:left"><b>Código:</b> '.$act->codigo.'<br><b>Actividad Gruesa: </b>'.$act->grupo.'</td>
					
					<td style="text-align:rigth"><b>Costo(Bs.):</b> '.$total.'<br> <b>Unidad: </b>'.$act->um.'</td>
				</tr>';
		$head.='</tbody>';
		$head.="</table>";
		$pdf->SetFillColor(255, 255, 255);
		$pdf->setCellPaddings(1, 1, 1, 1);
		$pdf->setCellMargins(1, 1, 1, 1);
		$pdf->MultiCell('', '', $head, 1, 'C', 0, 1, '20', '', true, 0, true, true, 40, 'T');
// fin del head actividad
// body actividad
		$body='<table style="padding:5" border="1">';
		$body.='<thead>';
		$body.='<tr style="background-color:#5bc0de;color:#000"><th>DESCRIPCIÓN</th><th style="text-align:center">UNID.</th><th style="text-align:center">REND.</th><th style="text-align:center">P.U</th><th style="text-align:rigth">TOTAL</th></tr>';
		$body.='</thead>';
			$body.='<tbody>';
			if(count($mat))
				$body.='<tr>
                            <td colspan="5" style="text-align:left"><b>'.$mat[0]['renglon'].'</b></td>
                        </tr>';
                        
                        $total=0; 
                        foreach($mat as $item){
                        	$total+=$item['total'];
                        	$body.=' <tr>
                            <td>'.$item['descripcion'].'</td>
                            <td>'.$item['um'].'</td>
                            <td>'.$item['rendimiento'].'</td>
                            <td>'.$item['precio_unitario'].'</td>
                            <td>'.$item['total'].'</td>
                        </tr>';
                        }
                        if(count($mat))
                        	$body.=' <tr style="background-color:#ccc;">
                                <td colspan="5" style="text-align:center"><b>Sub total '.$mat[0]['renglon'].' (Bs): '.$total.'</b></td>
                            </tr>';
            if(count($obra))
				$body.='<tr>
                            <td colspan="5" style="text-align:left"><b>'.$obra[0]['renglon'].'</b></td>
                        </tr>';

                        $total=0; 
                        foreach($obra as $item){
                        	$total+=$item['total'];
                        	$body.=' <tr>
                            <td>'.$item['descripcion'].'</td>
                            <td>'.$item['um'].'</td>
                            <td>'.$item['rendimiento'].'</td>
                            <td>'.$item['precio_unitario'].'</td>
                            <td>'.$item['total'].'</td>
                        </tr>';
                        }
                        if(count($obra))
                        	$body.=' <tr style="background-color:#ccc">
                                <td colspan="5" style="text-align:center"><b>Sub total '.$obra[0]['renglon'].' (Bs): '.$total.'</b></td>
                            </tr>';
            if(count($tools))
				$body.='<tr>
                            <td colspan="5" style="text-align:left"><b>'.$tools[0]['renglon'].'</b></td>
                        </tr>';

                        $total=0; 
                        foreach($tools as $item){
                        	$total+=$item['total'];
                        	$body.=' <tr>
                            <td>'.$item['descripcion'].'</td>
                            <td>'.$item['um'].'</td>
                            <td>'.$item['rendimiento'].'</td>
                            <td>'.$item['precio_unitario'].'</td>
                            <td>'.$item['total'].'</td>
                        </tr>';
                        }
                        if(count($tools))
                        	$body.=' <tr style="background-color:#ccc">
                                <td colspan="5" style="text-align:center"><b>Sub total '.$tools[0]['renglon'].' (Bs): '.$total.'</b></td>
                            </tr>';


			$body.='</tbody>';
		$body.='</table>';
// fin body actividad
		$pdf->MultiCell('', '', $body, 1, 'C', 0, 1, '20', '', true, 0, true, true, 40, 'T');
		$pdf->lastPage();
		$pdf->Output('detalle '.$act->actividad.'.pdf', 'I');
    }
}
