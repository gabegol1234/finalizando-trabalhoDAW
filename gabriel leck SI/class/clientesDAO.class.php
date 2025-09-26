<?php

include_once "clientes.class.php";

class clientesDAO
{
    private $conexao;
    private $con;

    public function __construct()
    {
        $this->conexao = new PDO(
            "mysql:host=localhost; dbname=gabriel_ecommerce",
            "root",
            ""
        );
        $this->con = mysqli_connect("localhost", "root", "", "gabriel_ecommerce");
    }
    public function listar()
    {
        $sql = $this->conexao->prepare(
            "SELECT * FROM clientes"
        );
        $sql->execute();
        return $sql->fetchAll();
    }
    public function inserir(Clientes $obj)
    {
        //$sql = $this->conexao->prepare("SELECT * FROM clientes WHERE cpf = :cpf");
        //$sql->bindValue(":cpf", $obj->getCpf());
        //$sql->execute();
        //if ($sql->rowCount() > 0) {
           // return 2;
       // }

        $sql = $this->conexao->prepare("SELECT * FROM clientes WHERE usuario = :usuario");
        $sql->bindValue(":usuario", $obj->getUsuario());
        $sql->execute();
        if ($sql->rowCount() == 0) {
            $sql = $this->conexao->prepare(
            "INSERT INTO clientes
            (nome,usuario,senha,contato,cpf)
            VALUES
            (:nome,:usuario,:senha,:contato,:cpf)"
        );
        $sql->bindValue(":nome", $obj->getNome());
        $sql->bindValue(":usuario", $obj->getUsuario());
        $salt = "_".$obj->getUsuario(); //adiciona o salt de segurança
        $sql->bindValue(":senha", hash('md5',$obj->getSenha().$salt));
        $sql->bindValue(":contato", $obj->getContato());
        $sql->bindValue(":cpf", $obj->getCpf());
        return $sql->execute();
    }else{
        return 3;
    }
    
    }
    public function excluir($idCliente)
    {
        $sql = $this->conexao->prepare("
        DELETE FROM clientes WHERE idCliente = :idCliente
        ");
        $sql->bindValue(":idCliente", $idCliente);
        return $sql->execute();
    }
    public function retornarUm($idCliente)
    {
        $sql = $this->conexao->prepare("
        SELECT * FROM clientes WHERE idCliente = :idCliente
        ");
        $sql->bindValue(":idCliente", $idCliente);
        $sql->execute();
        return $sql->fetch();
    }
    public function login(Clientes $clientes)
    {
        $sql = $this->conexao->prepare("
        SELECT * FROM clientes WHERE usuario = :usuario
        ");
        $sql->bindValue(":usuario", $clientes->getUsuario());
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $salt = "_".$clientes->getUsuario();
            while ($retorno = $sql->fetch()) {
                if ($retorno["senha"] == hash('md5',$clientes->getSenha()).$salt) {
                    return $retorno; //tudo ok! faça o login
                }
            }
            return 1; //senha incorreta
        } else {
            return 2; //usuario  nao cadastrado
        }
    }
    public function editar(Clientes $clientes)
    {

        $query = mysqli_query($this->con, "SELECT * FROM clientes WHERE cpf = '" . $clientes->getCpf() . "' AND idCliente != '" . $clientes->getIdCliente() . "'");
        if (mysqli_fetch_assoc($query)) {
            return 2;
        }
        $query = mysqli_query($this->con, "SELECT * FROM clientes WHERE usuario = '" . $clientes->getUsuario() . "' AND idCliente != '" . $clientes->getIdCliente() . "'");
        if (mysqli_fetch_assoc($query)) {
            return 3;
        }

        $sql = $this->conexao->prepare("
        UPDATE clientes SET
        nome = :nome, usuario = :usuario, senha =: senha, cpf = :cpf, contato = :contato
        WHERE idCliente = :idCliente
        ");
        $sql->bindValue(":idCliente", $clientes->getIdCliente());
        $sql->bindValue(":contato", $clientes->getContato());
        $sql->bindValue(":senha", $clientes->getSenha());
        $sql->bindValue(":nome", $clientes->getNome());
        $sql->bindValue(":cpf", $clientes->getCpf());
        $sql->bindValue(":usuario", $clientes->getUsuario());
        return $sql->execute();
    }
}
