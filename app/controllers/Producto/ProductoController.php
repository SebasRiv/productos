<?php 

    require_once(ROOT . FOLDER_PATH . 'app/models/Producto/ProductoModel.php');

    class ProductoController extends Controller {

        private $model;

        public function __construct() {
            $this->model = new ProductoModel();
        }

        public function exec($param) {
            $this->getProductos();
        }

        public function getProductos($message = '', $message_type = 'success') 
        {
            $productos = $this->model->getProductos();

            $params = array('show_productos' => true, 'message_type' => $message_type, 'message' => $message, 'productos' => $productos);
            $this->render(__CLASS__, $params);
        }

        public function addProducto($params) {

            $result = $this->model->addProducto($params);

            if (!$result || !$this->model->affected_rows()) {
                return $this->getProductos('', 'Hubo un error al crear el producto');
            }
            
            return $this->getProductos('', 'Producto Creado');
        }

        public function removeProducto($id) {
            if (empty($id)) {
                return $this->getProductos($id ,'No se recibió id del producto', 'warning');
            }

            if (!is_numeric($id)) {
                return $this->getProductos($id, 'El id del producto no es numérico', 'warning');
            }

            $result = $this->model->removeProducto($id);

            if (!$result || !$this->model->affected_rows()) {
                return $this->getProductos("Hubo un error al eliminarcon id $id", 'warning' );
            }

            $this->getProductos($id, "Se ha eliminado el producto con id $id exitosamente");
        }

        public function editProducto($params)
        {
            $result = $this->model->updateProducto($params);

            if (!$result || !$this->model->affected_rows()) {
                return $this->getProductos("Hubo un error al editar el producto con id {$params['id']}", 'warning' );
            }

            $this->getProductos("Comprador con id {$params['id']} actualizado");
        }

        public function getProducto($id) {
            $result = $this->model->getProducto($id);

            if (!$result || !$this->model->affected_rows()) {
                return $this->getProductos("Hubo un error al editar el producto con id $id", 'warning' );
            }

            $this->getProductos();

        }

    }

?>