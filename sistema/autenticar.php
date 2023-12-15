<?php
@session_start();
require_once("../conexao.php");
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$senha_crip=md5($senha);
$query = $pdo->prepare("SELECT * FROM users WHERE (email=:usu or cpf = :usu) and senha_crip= :senha");
$query->bindValue(":usu", "$usuario");
$query->bindValue(":senha", "$senha_crip");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg= @count($res);

if($total_reg>0){
    
    $_SESSION['id'] =$res[0]['id'];
    $_SESSION['nome'] =$res[0]['nome'];
    $_SESSION['nivel_id'] =$res[1]['nivel_id'];
    $_SESSION['empresa_id'] =$res[0]['empresa_id'];
    
    //armazenar no storage o id
    echo "<script>localStorage.setItem('id, '$id'</script>";
    //$id_teste = "<script>document.write(localStorage.id)</script>";
    

    if($res[0]['nivel_id']!='1'){
        echo '<script>alert("Usuário Inativo, contate o Administrador")</script>';
        echo '<script>window.location="index.php"</script>';
        exit();
    };
    if($_SESSION['nivel'=='1']){
        echo '<script>window.location="sas"</script>';
    }else{
        echo '<script>window.location="sistema"</script>';
    }
}else{
    echo '<script>alert("Dados Incorretos")</script>';
    echo '<script>window.location="index.php"</script>';
    exit();
}
?>