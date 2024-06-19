<?php

use App\Models\TipoPerfilModel;
use CodeIgniter\Config\Services;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function validateAccess($roles, $authHeader)
{
    if(!is_array($roles)) return false;

    $key = Services::getSecretKey();

    $arr = explode(' ', $authHeader);
    $jwt = $arr[1];

    $jwt = JWT::decode($jwt, new Key($key, 'HS256'));
    
    $perfilModel = new TipoPerfilModel();
    $perfil = $perfilModel->find($jwt->data->perfil);

    if($perfil == null) return false;

    if(!in_array($perfil['nombre'], $roles)) return false;

    return true;
}

?>