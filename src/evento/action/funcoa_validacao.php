<?php



function valida_nome($nome){
    if($nome="" || $nome=0  ){
        return false;
       
    }
    else{
        return true;
        
    }
}
///////////////////////////////////////
function valida_tel($tel){
    if(!preg_match('^\(+[0-9]{2,3}\) [0-9]{4}-[0-9]{4}$^', $tel)){

        return true ;
    }
    else {
        return false;
    }
};
/////////////////////////////////////////////////////////
function valida_email($email){
    
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    require_once('conexao.php');
$database = new Database();
$db = $database->conectar();
    $sql_cadastro ='SELECT id_pessoas from pessoas where  email="'.$email.'" ;';
    $query_cadastro = $db->prepare( $sql_cadastro );
    $query_cadastro->execute();
    $events = $query_cadastro->fetchAll();
    if(isset($events[0][0])){
        return false;

    }else{

    return true;
 
}
}};

//////////////////////////////////////////////
 function valida_pass ($senha1,$senha2){
    if($senha1===$senha2){
        return true;
    }else{

        return false;
    }
 };
 //////////////////////////////////////////////

function valida_cpf($valor){
 
    $valor = str_replace(array('.','-','/'), "", $valor);
    $cpf = str_pad(preg_replace('[^0-9]', '', $valor), 11, '0', STR_PAD_LEFT);
    
    if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999'):
        return false;
    else: 
        for ($t = 9; $t < 11; $t++):
            for ($d = 0, $c = 0; $c < $t; $c++) :
                $d += $cpf{$c} * (($t + 1) - $c);
            endfor;
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d):
                return false;
            endif;
        endfor;
        return true;
    endif;
}

?>

