<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <!-- FONT-AWESOME -->
    <script src="https://kit.fontawesome.com/76324e64d2.js" crossorigin="anonymous"></script>
    <title>Productos</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="d-inline-block navbar-brand mx-auto">Productos</a>
    </nav>

    <div class="container p-4">

        <div class="card m-4">
            <div class="card-body">
                <form id="productos-form" method="POST" action="<?= FOLDER_PATH . "producto/addProducto/" ?>">
                    <!-- <input type="hidden" id="productoId"> -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="nombre" placeholder="Nombre del producto" class="form-control">
                            </div>
                            <div class="col">
                                <input type="text" name="referencia" placeholder="referencia" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="precio" placeholder="precio" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="peso" placeholder="peso" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="categoria" placeholder="categoria" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="stock" placeholder="stock" class="form-control">
                    </div>
                    <!-- <input type="hidden" name="id" value="<?= $id?>"> -->
                    <?php
                        !empty($message)
                        ? print("<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">$message</div>")
                        : ''
                     ?>
                    <div class="d-flex justify-content-around">
                        <button type="submit" class="btn btn-primary text-center">
                            Agregar
                        </button>
                        <button type="button" class="btn btn-primary text-center cancelar">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <table class="table table-bordered table-sm" id="tabla">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre de producto</td>
                    <td>Referencia</td>
                    <td>Precio</td>
                    <td>Peso</td>
                    <td>Categoria</td>
                    <td>Stock</td>
                    <td>Fecha creacion</td>
                    <td>Fecha de ultima venta</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody id="productos">
            <?php while($row = $productos->fetch_assoc()) {?> 
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nombre'] ?> </td>
                    <td><?= $row['referencia'] ?> </td>
                    <td><?= $row['precio'] ?> </td>
                    <td><?= $row['peso'] ?> </td>
                    <td><?= $row['categoria'] ?> </td>
                    <td><?= $row['stock'] ?> </td>
                    <td><?= $row['fecha_creacion'] ?> </td>
                    <td><?= $row['fecha_ultima_venta'] ?> </td>
                    <td><a class="btn btn-danger" href="<?= FOLDER_PATH . "producto/removeProducto/{$row['id']}"?>">Borrar producto</a></td>
                    <td><a class="btn btn-warning" href="<?= FOLDER_PATH . "producto/getProducto/{$row['id']}"?>">Editar producto</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- JQuery  AND BOOTSTRAP JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <!-- CUSTOM JS -->

</body>

</html>