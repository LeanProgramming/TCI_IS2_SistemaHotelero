<?php

namespace App\Validations;
use App\Models\HabitacionModel;

class CustomRules
{
    public function is_unique_room($value, string $str, array $data, ?string &$error = "The room already exists."): bool
    {
        $room_num = $data['nro_habitacion'];
        $floor_num = isset($data['id_piso']) ? $data['id_piso'] : 0;
        $id = isset($data['id_habitacion']) ? $data['id_habitacion'] : null;

        $model = new HabitacionModel();
        
        if($id == null){
            $room = $model->where(['nro_habitacion' => $room_num,'id_piso' => $floor_num ])->first();
            return $room === null;
        } else {
            return true;
        }      
    }
}

?>