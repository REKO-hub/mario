public function ver_carrito(){

        

        

//Recuperamos los productos en el carrito

if(get_cookie('carrito')) {

    $aCarrito = unserialize(get_cookie('carrito'));

    

            $data['carrito'] = $aCarrito; //Guardamos el contenido del carrito

            $data['total_productos'] =count($aCarrito);



} else {

            $data['carrito'] = null; //Guardamos el contenido del carrito

            $data['total_productos'] =0;

}







$this->load->view('comunes/head_view');



$this->load->view('carrito_view',$data);  //Pasamos el contenido a la vista



$this->load->view('comunes/footer_view');        





}









public function agregar_producto($id, $nombre, $precio){





$aCarrito = array();



        //Obtenemos los productos anteriores

if(get_cookie('carrito')) {

    $aCarrito = unserialize(get_cookie('carrito'));

}





   $iUltimaPos = count($aCarrito);

$aCarrito[$iUltimaPos]['id'] = $id;

$aCarrito[$iUltimaPos]['nombre'] = $nombre;

$aCarrito[$iUltimaPos]['precio'] = $precio;



        //Creamos la cookie (serializamos)

$iTemCad = time() + (60 * 60);

$this->input->set_cookie('carrito', serialize($aCarrito), $iTemCad);



            

    



}





public function eliminar_producto($id){





$aCarrito = unserialize(get_cookie('carrito'));



unset($aCarrito[$id]);



//Recreamos la Cookie

$iTemCad = time() + (60 * 60);

$this->input->set_cookie('carrito', serialize($aCarrito), $iTemCad);

    redirect('welcome/ver_carrito', 'refresh');



}

$this->load->helper('cookie');



    public function caballos(){
        
       $data['productos'] = $this->model_productos->listar_productos();

		$this->load->view('comunes/head_view');
        
        $this->load->view('caballos_view', $data); //  <<<-------------------- Es la que cambia
        
        $this->load->view('comunes/footer_view');        
    }
    
    
    
        
    public function social(){
        
		$this->load->view('comunes/head_view');
        
        $this->load->view('social_view'); //  <<<-------------------- Es la que cambia
        
        $this->load->view('comunes/footer_view');        
    }
    
    
    
  
  
  public function ver_carrito(){
        
        
        //Recuperamos los productos en el carrito
        if(get_cookie('carrito')) {
        	$aCarrito = unserialize(get_cookie('carrito'));
            
                    $data['carrito'] = $aCarrito; //Guardamos el contenido del carrito
                    $data['total_productos'] =count($aCarrito);
  
        } else {
                    $data['carrito'] = null; //Guardamos el contenido del carrito
                    $data['total_productos'] =0;
        }
        

   
		$this->load->view('comunes/head_view');
        
        $this->load->view('carrito_view',$data);  //Pasamos el contenido a la vista
        
        $this->load->view('comunes/footer_view');        


        
    }
        
    
    
    
    
    public function agregar_producto($id, $nombre, $precio){
        
        
        $aCarrito = array();
        
                //Obtenemos los productos anteriores
        if(get_cookie('carrito')) {
        	$aCarrito = unserialize(get_cookie('carrito'));
        }
        
        
       	$iUltimaPos = count($aCarrito);
        $aCarrito[$iUltimaPos]['id'] = $id;
    	$aCarrito[$iUltimaPos]['nombre'] = $nombre;
    	$aCarrito[$iUltimaPos]['precio'] = $precio;
        
                //Creamos la cookie (serializamos)
        $iTemCad = time() + (60 * 60);
        $this->input->set_cookie('carrito', serialize($aCarrito), $iTemCad);
        
                    
            echo  "<script type='text/javascript'>";
            echo "window.close();";
            echo "</script>";    
       
    }

    
    public function eliminar_producto($id){
        
        
        $aCarrito = unserialize(get_cookie('carrito'));
        
        unset($aCarrito[$id]);
        
        //Recreamos la Cookie
        $iTemCad = time() + (60 * 60);
        $this->input->set_cookie('carrito', serialize($aCarrito), $iTemCad);
          
          
           redirect('welcome/ver_carrito', 'refresh');
        
    }
    
    
  
  
    
}
