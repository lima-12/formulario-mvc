<?php
namespace app\controllers;

use app\repository\usuarioRepository;

class UsuarioController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new usuarioRepository();
    }

    public function login()
    {
        // echo'<pre>'; print_r($_REQUEST); echo'</pre>'; exit;

        $resposta = $this->repository->login($_REQUEST["email"], $_REQUEST["senha"]);

        // echo'<pre>'; print_r($resposta); echo'</pre>'; exit;

        if ($resposta) {

            $aUsuarios = $this->repository->getAll();

            $this->view('listar_usuarios', 
                [
                    'title' => 'site',
                    'aUsuarios' => $aUsuarios
                ]
            );
        } else {
            // $this->view('home', 
            //     [
            //         'title' => 'site',
            //         'message' => 'email ou senha incorreto!'
            //     ]
            // );

            header("Location: /login");
            exit;
        }

    }
}
