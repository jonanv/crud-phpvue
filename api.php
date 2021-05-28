<?php
    require "./connection.php";
    $user = new AppDB();

    // action = create, read, update, delete
    $action = "read";
    $response = array("error" => false);

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
                $foto = $_POST['foto']['name'];

                $target_dir = "img/";
                $target_file = $target_dir . basename($foto);
                move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
                // TODO: Revisar linea de move_file (31)

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
                echo "modificar";
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
