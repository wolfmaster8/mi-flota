<?php

function validateFields($allFields)
{
    foreach ($allFields as $field){
        if(empty($field)){
            echo json_encode('Revisa todos los campos');
            http_response_code(400);
        exit();
        }
    }
}
