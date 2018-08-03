<?php

class Actividad_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function addAct($grupo,$cod,$name,$um)
    {
        $data=array(
            'id_grupo'=>$grupo,
            'codigo'=>$cod,
            'actividad'=>$name,
            'id_unidm'=>$um
        );
        $this->db->insert('actividad',$data);
        // return $this->db->insert_id('actividad_id_seq');
        return $this->db->insert_id();
    }  

    public function editAct($id,$grupo,$cod,$name,$um)
    {
        $data=array(
            'id_grupo'=>$grupo,
            'codigo'=>$cod,
            'actividad'=>$name,
            'id_unidm'=>$um
        );
        $this->db->where('id',$id);
        return $this->db->update('actividad',$data);
    }

    public function getActividadById($id)
    {
        $this->db->where('actividad.id',$id);
        $this->db->join('unidad_m','unidad_m.id=actividad.id_unidm');
        $this->db->join('grupo','grupo.id=actividad.id_grupo');
        $this->db->select('grupo.id as idgroup,unidad_m.id as idum,actividad.id,actividad.codigo,actividad.actividad,unidad_m.unidad as um,
        grupo.grupo');
        $qry=$this->db->get('actividad');
        return $qry->row();
    }

    public function getDescripcion($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('descripcion');
        return $query->row();
    }

    public function addDesc($act,$reng,$name,$um,$rend,$pu,$total)
    {
        $data=array(
            'id_actividad'=>$act,
            'descripcion'=>$name,
            'id_renglon'=>$reng,
            'id_unidad'=>$um,
            'precio_unitario'=>$pu,
            'rendimiento'=>$rend,
            'total'=>$total
        );
    return $this->db->insert('descripcion',$data);
    }

    public function editDesc($id,$reng,$name,$um,$rend,$pu,$total)
    {
        $data=array(
            'descripcion'=>$name,
            'id_renglon'=>$reng,
            'id_unidad'=>$um,
            'precio_unitario'=>$pu,
            'rendimiento'=>$rend,
            'total'=>$total
        );
        $this->db->where('id',$id);
    
        return $this->db->update('descripcion',$data);
    }

    public function getDescription($act)
    {
        $this->db->where('descripcion.id_actividad',$act);
        $this->db->join('unidad_m','unidad_m.id=descripcion.id_unidad');
        $this->db->join('renglones','renglones.id=descripcion.id_renglon');
        $this->db->select('descripcion.id,descripcion.id_actividad as act,descripcion.descripcion,renglones.renglon,
        descripcion.rendimiento,descripcion.precio_unitario,descripcion.total,unidad_m.unidad as um,descripcion.id_renglon');
        $this->db->order_by('descripcion.id_renglon');
        $qry=$this->db->get('descripcion');
        return $qry->result_array();
    }

    public function getAllActividad()
    {
        $this->db->join('unidad_m','unidad_m.id=actividad.id_unidm');
        $this->db->join('grupo','grupo.id=actividad.id_grupo');
        $this->db->select('actividad.id,actividad.codigo,actividad.actividad,unidad_m.unidad as um,
        grupo.grupo');
        $qry=$this->db->get('actividad');
        return $qry->result_array();
    }

    public function suma($act,$tipo)
    {
        $this->db->select('sum(total) as total');
        $this->db->where('id_actividad',$act);
        $this->db->where('id_renglon',$tipo);
        $qry=$this->db->get('descripcion');
        if($qry->num_rows()>0)
            return $qry->row();

        return 0;
    }

    public function deleteDescr($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('descripcion');
    }

    public function getAllDesc($id)
    {
        $this->db->where('id_actividad',$id);
        $qry=$this->db->get('descripcion');
        return $qry->result_array();
    }

    public function deleteActividad($id)
    {
        $all=$this->getAllDesc($id);
        foreach ($all as $item) {
            $this->deleteDescr($item['id']);
        }

        $this->db->where('id',$id);
        return $this->db->delete('actividad');
    }
    
}