<?php 

    class ProductoModel extends Model {

        public function __construct()
        {
            parent::__construct();
        }

        public function affected_rows() 
        {
            return $this->db->affected_rows;
        }

        public function getProductos() 
        {
            $query = "SELECT * FROM productos";
            return $this->db->query($query);
        }

        public function getProducto($id) 
        {
            $query = "SELECT * FROM productos WHERE id = '$id'";
            return $this->db->query($query);
        }

        public function addProducto($params) 
        {

            $nombre = $params['nombre']; 
            $referencia = $params['referencia']; 
            $precio = $params['precio']; 
            $peso = $params['peso']; 
            $categoria = $params['categoria']; 
            $stock = $params['stock']; 
            $fecha_creacion = date("Y-m-d");; 
            $fecha_ultima_venta = date("Y-m-d H:i:s");

            $query = "INSERT INTO productos (nombre, referencia, precio, peso, categoria, stock, fecha_creacion, fecha_ultima_venta) VALUES ('$nombre','$referencia','$precio','$peso','$categoria','$stock', '$fecha_creacion', '$fecha_ultima_venta')";

            return $this->db->query($query);
        }

        public function removeProducto($id) 
        {
            $query = "DELETE FROM productos WHERE id = '$id'";
            return $this->db->query($query);
        }
        
        public function updateProducto($params)
        {
            $id = $params['id'];
            $nombre = $params['nombre']; 
            $referencia = $params['referencia']; 
            $precio = $params['precio']; 
            $peso = $params['peso']; 
            $categoria = $params['categoria']; 
            $stock = $params['stock']; 
            $fecha_creacion = date("Y-m-d");; 
            $fecha_ultima_venta = date("Y-m-d H:i:s");

            $query = "UPDATE productos SET nombre = '$nombre', referencia = '$referencia', precio= '$precio', peso = '$peso', categoria = '$categoria', stock = '$stock', fecha_creacion= '$fecha_creacion', fecha_ultima_venta = '$fecha_ultima_venta WHERE id ='$id'";

            return $this->db->query($query);

        }
    }

?>