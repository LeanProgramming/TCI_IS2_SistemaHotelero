<?php

namespace App\Validations;
use App\Models\HabitacionModel;
use DateTime;

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

    public function is_entry_date_valid($value): bool
    {
        $now = (new DateTime())->format('Y-m-d');
        $entryDate = (new DateTime($value))->format('Y-m-d');

        return ($entryDate >= $now);  
    }

    public function is_exit_date_valid($value, string $str, array $data,): bool
    {
        $entryDate = (new DateTime($data['fecha_ingreso']))->format('Y-m-d');
        $exitDate = (new DateTime($value))->format('Y-m-d');

        return ($exitDate > $entryDate);  
    }
}

?>