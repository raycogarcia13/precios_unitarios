<?php
/**
 * Created by PhpStorm.
 * User: kronos
 * Date: 21/08/17
 * Time: 14:46
 */
class Users_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function encoder($pass)
    {
        return sha1($pass);
    }


    public function login($user,$pass)
    {
        $this->db->where('user.username',$user);
        $this->db->where('user.password',$this->encoder($pass));
        $this->db->join('rol','rol.id=user.id_rol');
        $this->db->select('user.id,user.username,user.id_rol,user.nombre,
                            rol.rol as rol');
        $query=$this->db->get('user');

        if($query->num_rows() == 0)
            $this->session->set_flashdata('error_user','Los datos introducidos son incorrectos');
        else
            return $query->row();
    }

    public function getAll()
    {
        $this->db->join('rol','rol.id=user.id_rol');
        $this->db->select('user.id,user.username,user.id_rol,user.nombre,
                            rol.rol');
        $this->db->order_by('username','ASC');
        $query=$this->db->get('user');
        return $query->result_array();
    }

    public function getAllRol()
    {
        $query=$this->db->get('rol');
        return $query->result_array();
    }

    public function addUser($user,$pass,$name,$rol)
    {
        $data=array(
            'username'  =>$user,
            'password'  =>$this->encoder($pass),
            'nombre'    =>$name,
            'id_rol'    =>$rol
        );
        return $this->db->insert('user',$data);
    }

    public function editUser($id,$user,$pass,$name,$rol)
    {
        $data=array(
            'username'  =>$user,
            'nombre'    =>$name,
            'id_rol'    =>$rol
        );
        if($pass!='')
            $data['password']=$this->encoder($pass);

        $this->db->where('id',$id);
        return $this->db->update('user',$data);
    }

    public function deleteUser($id)
    {
        if($id!=1)
        {
            $this->db->where('id',$id);
            return  $this->db->delete('user');
        }
        return 0;
        
    }
}
