<?php 

namespace App\Filters;

use App\Models\TipoPerfilModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Config\Services;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthFilter implements FilterInterface {

    use ResponseTrait;

    public function before(RequestInterface $request, $arguments = null)
    {
        //Se ejecuta antes de cualquier controlador
        try {
            $key = Services::getSecretKey();
            $authHeader = $request->getServer('HTTP_AUTHORIZATION');

            if($authHeader == null) {
                return Services::response()->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED, 'No se ha enviado el JWT requerido');
            }

            $arr = explode(' ', $authHeader);
            $jwt = $arr[1];

            $jwt = JWT::decode($jwt, new Key($key, 'HS256'));

            $perfilModel = new TipoPerfilModel();
            $perfil = $perfilModel->find($jwt->data->perfil);

            if($perfil == null) {
                return Services::response()->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED, 'El perfil del JWT es inválido.');
            }

            return true;
        } catch (ExpiredException $ee){
            return Services::response()->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED, 'Su token JWT ha expirado');
        } catch (\Exception $e) {
            return Services::response()->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR, 'Ocurrio un error en el servidor al validar el token');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //Se ejecuta despues de cualquier controlador
    }
}

?>