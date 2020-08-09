<?php 

    if (!function_exists('generate_code')) {
        function generate_code($last_code){
            $array_code = str_split($last_code);
            $prefix = $array_code[0];
            $number = '';
            for ($i=1; $i < count($array_code) ; $i++) { 
                # code...
                $number .= $array_code[$i];
            }
            $number = intval($number) + 1;
            if ($number < 10) {
                $new_code = $prefix . '00' . $number;
            }else if($number < 100){
                $new_code = $prefix . '0' . $number;
            }else{
                $new_code = $prefix . $number;
            }

            return $new_code;
        }
    }

?>