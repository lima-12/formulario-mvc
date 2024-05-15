<?php

namespace app\repository;

use app\config\Config;
use PDO;
use PDOException;

class usuarioRepository
{

    protected $pdo;

    public function __construct()
    {
        $conexao = new Config();
        $this->pdo = $conexao->pdo;
    }

    public function login($email, $senha) 
    {

        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = ? AND senha = ?');
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $stmt->bindValue(2, $senha, PDO::PARAM_INT);
        $stmt->execute();

        // Verifica se existe algum usuário com as credenciais fornecidas
        if ($stmt->rowCount() > 0) {
            return true; // Usuário encontrado
        } else {
            return false; // Nenhum usuário correspondente encontrado
        }
    }

    function getAll(){
        
        try {
            $stmt = $this->pdo->query('SELECT * FROM usuarios');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro na consulta: " . $e->getMessage();
            return false;
        }

    }
}