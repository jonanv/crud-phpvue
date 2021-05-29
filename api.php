<?php
    require "./connection.php";
    $user = new AppDB();

    $response = array("error" => false);
    
    // action = create, read, update, delete
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        switch ($action) {
            case 'read':
                $u = $user->search("paisajes", "1");
                if ($u) {
                    $response['paisajes'] = $u;
                    $response['message'] = "ok";
                } else {
                    $response['message'] = "Aun no hay registros";
                    $response['error'] = true;
                }
                break;

            case 'create':
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $foto = $_FILES['foto']['name'];

                $target_dir = "img/";
                $target_file = $target_dir . basename($foto);
                move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);

                $data = "'" . $nombre . "','" . $descripcion . "','" . $foto . "'";
                $u = $user->create("paisajes", $data);
                
                if ($u) {
                    $response['paisajes'] = $u;
                    $response['message'] = "inserción exitosa";
                } else {
                    $response['message'] = "Aun no hay registros";
                    $response['error'] = true;
                }
                break;
                
            case 'update':
                $id = $_POST['eid'];
                $nombre = $_POST['enombre'];
                $descripcion = $_POST['edescripcion'];
                $foto = "";

                if(isset($_FILES['efoto']['name'])) {
                    $foto = $_FILES['efoto']['name'];
                    $target_dir = "img/";
                    $target_file = $target_dir . basename($foto);
                    move_uploaded_file($_FILES['efoto']['tmp_name'], $target_file);
                    $foto = ", foto='" . $_FILES['efoto']['name'] . "'";
                }

                $data = "nombre='" . $nombre . "', descripcion='" . $descripcion . "'" . $foto;
                $u = $user->update("paisajes", $data, "id=" . $id);

                if ($u) {
                    $response['message'] = "Modificación exitosa";
                } else {
                    $response['message'] = "Aun no hay registros";
                    $response['error'] = true;
                }
                break;

            case 'delete':
                echo "eliminar";
                break;

            default:
                # code...
                break;
        }
    }

    echo json_encode($response);
    die();
