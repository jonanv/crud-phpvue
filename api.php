<?php
    require "./connection.php";
    $user = new AppDB();

    // action = create, read, update, delete
    $action = "read";
    $response = array("error"=>false);
    
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        switch ($action) {
            case 'create':
                echo "crear";
                break;

            case 'read':
                $u = $user->search("paisajes", "1");
                if ($u) {
                    $response['paisajes'] = $u;
                    $response['message'] = "ok";
                }
                else {
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