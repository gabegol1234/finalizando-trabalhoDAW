<?php

include_once "clientes.class.php"; 
include_once "filmes.class.php";

function calcularGenero($idGenero) {
    $con = mysqli_connect("localhost", "root", "", "gabriel_ecommerce");
    
    $nomeGenero = mysqli_query($con, "SELECT nome FROM categorias WHERE idCategoria = '".$idGenero."'");

    while($cadaNome = mysqli_fetch_assoc($nomeGenero)) {
        return $cadaNome['nome'];
    }
}

class FilmesDAO
{
   private $conexao;

    public function __construct()
    {
        $this->conexao = new PDO(
            "mysql:host=localhost; dbname=gabriel_ecommerce",
            "root",
            ""
        );
    }

    public function listar($complemento= "")
    {
        $sql = $this->conexao->prepare("SELECT filmes.*, categorias.nome as categorias FROM filmes INNER JOIN categorias ON filmes.genero = categorias.idCategoria " . $complemento);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function inserir(filmes $obj)
    {
        $sql = $this->conexao->prepare(
            "INSERT INTO filmes
            (nome, preco, genero, classificacaoEtaria, anoLancamento, descricao, duracao, trilhaSonora, ofertar)
            VALUES
            (:nome, :preco, :genero, :classificacaoEtaria, :anoLancamento, :descricao, :duracao, :trilhaSonora, :ofertar)"
        );
        $sql->bindValue(":nome", $obj->getNome());
        $sql->bindValue(":preco", $obj->getPreco());
        $sql->bindValue(":genero", $obj->getGenero());
        $sql->bindValue(":classificacaoEtaria", $obj->getClassificacaoEtaria());
        $sql->bindValue(":anoLancamento", $obj->getAnoLancamento());
        $sql->bindValue(":descricao", $obj->getDescricao());
        $sql->bindValue(":duracao", $obj->getDuracao());
        $sql->bindValue(":trilhaSonora", $obj->getTrilhaSonora());
        $sql->bindvalue(":ofertar",$obj->getOfertar());
        $sql->execute();

        return $this->conexao->lastInsertId();
    }

    public function excluir($idFilme)
    {
        $sql = $this->conexao->prepare("DELETE FROM filmes WHERE idFilme = :idFilme");
        $sql->bindValue(":idFilme", $idFilme);
        return $sql->execute();
    }

    public function retornarUm($idFilme)
    {
        $sql = $this->conexao->prepare("SELECT * FROM filmes WHERE idFilme = :idFilme");
        $sql->bindValue(":idFilme", $idFilme);
        $sql->execute();
        return $sql->fetch();
    }

    public function editar(Filmes $filmes)
    {
        $sql = $this->conexao->prepare("
            UPDATE filmes SET
            nome = :nome,
            preco = :preco,
            genero = :genero,
            classificacaoEtaria = :classificacaoEtaria,
            anoLancamento = :anoLancamento,
            descricao = :descricao,
            duracao = :duracao,
            trilhaSonora = :trilhaSonora,
            ofertar = :ofertar
            WHERE idFilme = :idFilme
        ");

        $sql->bindValue(":idFilme", $filmes->getIdFilme());
        $sql->bindValue(":nome", $filmes->getNome());
        $sql->bindValue(":preco", $filmes->getNome());
        $sql->bindValue(":genero", $filmes->getGenero());
        $sql->bindValue(":classificacaoEtaria", $filmes->getClassificacaoEtaria());
        $sql->bindValue(":anoLancamento", $filmes->getAnoLancamento());
        $sql->bindValue(":descricao", $filmes->getDescricao());
        $sql->bindValue(":duracao", $filmes->getDuracao());
        $sql->bindValue(":trilhaSonora", $filmes->getTrilhaSonora());
        $sql->bindValue(":ofertar", $filmes->getOfertar());

        return $sql->execute();
    }

    public function ofertar(Filmes $filmes)
    {
        $sql = $this->conexao->prepare("
            UPDATE filmes SET
            ofertar = :ofertar
            WHERE idFilme = :idFilme
        ");
        
        $sql->bindValue(":ofertar", $filmes->getOfertar());
        $sql->bindValue(":idFilme", $filmes->getIdFilme());
        
        return $sql->execute();
    }

    // ✅ Novo método para busca filtrada por nome ou descrição
    public function buscarFiltrado($termo)
    {
        $sql = $this->conexao->prepare("
            SELECT filmes.*, categorias.nome as categorias
            FROM filmes
            INNER JOIN categorias ON filmes.genero = categorias.idCategoria
            WHERE filmes.nome LIKE :termo OR filmes.descricao LIKE :termo
        ");
        $sql->bindValue(":termo", "%" . $termo . "%");
        $sql->execute();
        return $sql->fetchAll();
    }
}