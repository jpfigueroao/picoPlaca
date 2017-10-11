
<?php
 
if(isset($_POST['submit'])){
    try{
        $placa=$_POST['placa']; //Recoleción
        $fecha=$_POST['fecha']; // de la
        $hora=$_POST['hora'];   // información
        $plac=new placa();      // Instancia de la clase
        $number = $plac->lastNumber($placa); //Captura el útimo número
        $dia = date('N', strtotime($fecha)); //Devuelve el número del día de la semana
        $hor=strtotime($hora);
        $road=$plac->valida($number,$dia,$hor);
        if($road){
            //echo "La placa ".$placa." puede circular el ".$fecha." a las ".$hora." horas.";
            echo "<script>Materialize.toast('La placa ".$placa." puede circular el ".$fecha." a las ".$hora." horas.', 4500, 'green', 'rounded');</script>";
        }else{
            //echo "La placa ".$placa." NO puede circular el ".$fecha." a las ".$hora." horas.";
            echo "<script>Materialize.toast('La placa ".$placa." NO puede circular el ".$fecha." a las ".$hora." horas.', 4500, 'red');</script>";
        }
    }catch (Exception $e) {
    echo 'Error: ',  $e->getMessage(), "\n";
    }
}
?>