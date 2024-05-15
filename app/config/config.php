<?php

namespace app\config;

use PDO;
use PDOException;
use Dotenv\Dotenv;

require __DIR__ . '/../../vendor/autoload.php';         // Carrega o autoload do Composer
$dotenv = Dotenv::createImmutable(__DIR__ . '/../..');  // Crie uma nova instância do Dotenv
$dotenv->load();                                        // Carrega as variáveis de ambiente do arquivo .env

class Config {

    public $pdo;

    function __construct()
    {

        $ambiente = "teste";

        if ($ambiente == "teste") {
            $host = $_ENV['DB_HOST'];
            $dbname = $_ENV['DB_NAME'];
            $username = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASS'];
    
            try {
                $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                // Configurando o PDO para lançar exceções em caso de erro
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erro de conexão: " . $e->getMessage();
                exit();
            }
        } else {
            exit ("ambiente desconhecido!");
        }


    }

}
?>
