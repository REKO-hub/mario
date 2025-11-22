<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_productos extends CI_Model {

            function __construct(){

                parent::__construct();
                $this->load->database();

            }
            
            
            


    function listar_productos(){
            
        
        $this->db->select('*');
        $this->db->from('productos');
        $query= $this->db->get();
        
                
        if($query->num_rows()>0) return $query; else return false; 
    
                
            
            
            
        }    
      


}         