<?php
include_once "../class/filmes.class.php";
include_once "../class/filmesDAO.class.php";
include_once "../class/imagens.class.php";
include_once "../class/imagensDAO.class.php";

$obj = new Filmes();
$obj->setNome($_POST["nome"]);
$obj->setPreco($_POST["preco"]);
$obj->setGenero($_POST["genero"]);
$obj->setClassificacaoEtaria($_POST["classificacaoEtaria"]);
$obj->setAnoLancamento($_POST["anoLancamento"]);
$obj->setDescricao($_POST["descricao"]);
$obj->setDuracao($_POST["duracao"]);
$obj->setTrilhaSonora($_POST["trilhaSonora"]);
$obj->setOfertar($_POST["ofertar"]);

$objDAO = new FilmesDAO();
$retorno = $objDAO->inserir($obj);

$obj = new Imagens();
$obj->setIdFilme($retorno);
$objDAO = new ImagensDAO();

for($i=0; $i<count($_FILES["imagem"]["name"]); $i++){
    $nome = $_FILES["imagem"]["name"][$i];
    $nomeTmp = $_FILES["imagem"]["tmp_name"][$i];
    $diretorio = "../imagens/".$nome;
    if(move_uploaded_file($nomeTmp, $diretorio)){
        $obj->setNome($nome);
        $objDAO->inserir($obj);
    }
}

if($retorno){
    //header("location:listar.php?editarOk");
    echo "Produto inserido com sucesso.";
}
else{
    header("location:listar.php?editarErro");
}