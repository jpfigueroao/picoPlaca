<?php
class placa{
    private $placa;
    public function validar($placa){
        
    }
    public function lastNumber($placa){   //Función para conseguir el último número
        $resultado = intval(preg_replace('/[^0-9]+/', '', $placa), 10); 
        $number=substr($resultado, -1);
        return $number;
    }
    public function valida($placa,$dia,$hora){ // función para validar la circulación vehicular
        $horarioA1=strtotime('07:00');  //Estos datos 
        $horarioA2=strtotime('09:30');  //se podrían 
        $horarioB1=strtotime('16:00');  //extraer de 
        $horarioB2=strtotime('19:30');  //una BDD
        $h=1;
        $d=1;
        if($horarioA1<=$hora and $horarioA2>=$hora){  //Ver si la hora esta en el rango
            $h=0;
        }elseif($horarioB1<=$hora and $horarioB2>=$hora){
            $h=0;
        }
        switch($dia){   // ver si la placa petenece al los días
            case 1:
                if($placa==2 || $placa==1){
                    $d=0;
                }
                break;
            case 2:
                if($placa==4 || $placa==3){
                    $d=0;
                }
                break;
            case 3:
                if($placa==6 || $placa==5){
                    $d=0;
                }
                break;
            case 4:
                if($placa==8 || $placa==7){
                    $d=0;
                }
                break;
            case 5:
                if($placa==0 || $placa==9){
                    $d=0;
                }
                break;
            default:
                $d=1;
        }
        if(($h+$d)>=1){
            $run=true;
        }else{
            $run=false;
        }
        return $run;
    }
}
?>