<?php

class Nomenclador_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getGrupos()
    {
        $this->db->order_by('grupo','ASC');
        $query=$this->db->get('grupo');
        return $query->result_array();
    }
    
    public function getUm()
    {
        $this->db->order_by('unidad','ASC');
        $query=$this->db->get('unidad_m');
        return $query->result_array();
    }
    public function getRenglones()
    {
        $this->db->order_by('renglon','ASC');
        $query=$this->db->get('renglones');
        return $query->result_array();
    }

    public function addUm($name)
    {
        $data=array(
            'unidad'=>$name
        );

        return $this->db->insert('unidad_m',$data);
    }

    public function editUm($id,$um)
    {
        $data=array(
            'unidad'=>$um
        );
        $this->db->where('id',$id);
    
        return $this->db->update('unidad_m',$data);
    }

    public function delUm($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('unidad_m');
    }

    public function addGrupo($name)
    {
        $data=array(
            'grupo'=>$name
        );

        return $this->db->insert('grupo',$data);
    }

    public function editGrupo($id,$um)
    {
        $data=array(
            'grupo'=>$um
        );
        $this->db->where('id',$id);
    
        return $this->db->update('grupo',$data);
    }

    public function delGrupo($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('grupo');
    }
}