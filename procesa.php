<?php
$validaciones = [];

if(!empty($_POST)){ //si el formulario no esta vacio

    //nombre

    if(empty($_POST['nombre'])){ //Si el campo nombre esta vacio
        $validaciones['nombre']= 'El campo nombre es requerido';
    }elseif(strlen($_POST['nombre'])<3){ //cuenta la cantidad de caracteres
        $validaciones['nombre']='El campo nombre requiere mínimo 3 caracteres';
    }


    if(empty($_POST['apellido'])){ //Si el campo apellido esta vacio
        $validaciones['apellido']= 'El campo apellido es requerido';
    }elseif(strlen($_POST['apellido'])<3){ //cuenta la cantidad de caracteres
        $validaciones['apellido']='El campo apellido requiere mínimo 3 caracteres';
    }        


    //email

    if(empty($_POST['correo'])){ //Si el campo correo esta vacio
        $validaciones['correo']= 'El campo correo es requerido';
    }elseif(!filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL)){ //cuenta la cantidad de caracteres
        $validaciones['correo']='El campo correo requiere un correo válido';
    }

    


}

echo json_encode([
    'respuesta' => count($validaciones)===0,
    'errores'=> $validaciones
]);