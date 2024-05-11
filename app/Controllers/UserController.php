<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct() {
        
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $users = $this->userModel->findAll() ?? ["Resposta" => "Sem dados"];

        return view('users/index', ['users' => $users]);
    }
        
    public function create()
    {
        return view('users/create');
    }

    public function login()
    {
        return view('login/login');
    }

    public function signIn()
    {
        if ($this->request->getServer('REQUEST_METHOD') == 'POST') {
            // var_dump($_POST);

            $validated = $this->validate([
                'login' => 'required',
                'senha' => 'required',
            ],
            [
                'login' => [
                    'required' => 'Login obrigatório'
                ],
                'senha' => [
                    'required' => 'Senha obrigatório'
                ]
            ]);

            
            
            if(!$validated) {
                return redirect()->route('users_login')->with('errors', $this->validator->getErrors());
            }
            
            // $user = new UserModel();
            $userFound = $this->userModel->select('login, senha')->where('login', $this->request->getPost('login'))->first();
            
            if (!$userFound) {
                return redirect()->route('users_login')->with('error', 'Login ou senha inválidos');
            }
            // var_dump(!password_verify(strval($this->request->getPost('senha')), $userFound['senha']));
            // var_dump($userFound['senha']);
            // die;
            
            if(!password_verify(strval($this->request->getPost('senha')), $userFound->senha)){
                return redirect()->route('users_login')->with('error', 'Login ou senha inválidos');
            }

            unset($userFound->senha);
            session()->set('user', $userFound);
            // ->with('message', "Bem vindo " . $userFound->nome_completo);
            return redirect()->route('ingressos_index');
            // var_dump($userFound);
            // die;
        }
    }

    public function store()
    {
        // var_dump($_POST);
        // die;

        // Verifica se os dados foram enviados via POST
        if ($this->request->getServer('REQUEST_METHOD') == "POST") {
            // Carrega o modelo de admin
            // $users = new UserModel();

            // Obtém os dados do formulário
            $data = [
                'nome' => $this->request->getPost('nome'),
                'login' => $this->request->getPost('login'),
                'senha' => password_hash(strval($this->request->getPost('senha')), PASSWORD_DEFAULT),
            ];

            // Regra de validação personalizada para o campo "login"
            $validation = \Config\Services::validation();
            $validation->setRules([
                'login' => [
                    'label' => 'login',
                    'rules' => "required|is_unique[users.login]",
                    'errors' => [
                        'is_unique' => 'O {field} já está em uso.'
                    ]
                ]
            ]);

            // Insere os dados no banco de dados
            // $usermo ->insert($data);
            $this->userModel->insert($data);

            // Redireciona para uma página de sucesso ou outra página conforme necessário
            return redirect()->route('users_index');
        }
    }

    public function show($id)
    {
        try {
            $user = $this->userModel->find($id);
    
            return view('users/show', ['user' => $user]);
        } catch (Exception $exception) {
            echo "Erro encontrado: " . $exception->getMessage();
        }
    }

    public function update($id)
    {
        // var_dump($_POST);
        // die;

        // var_dump($user);
        // if($formSenha == $user['senha']){
        //     $senha = $user['senha'];
        //     // echo "iguais";
        // } else {
        //     $senha = $formSenha;
        //     // echo "diferente";
        // }
        // die;
        $formSenha = $_POST['senha'];
        $user = $this->userModel->find($id);

        if($this->request->getPost('_method') == 'PUT') {
            try {
                if($formSenha == $user['senha']){
                    $senha = $user['senha'];
                } else {
                    $senha = $formSenha;
                }

                $data = [
                    "nome" => $this->request->getPost('nome'),
                    "login" => $this->request->getPost('login'),
                    "senha" => $senha,
                ];

                $this->userModel->update($user['id'], $data);

                return redirect()->route('users_index');
            } catch (Exception $exception) {
                echo "<p class='text-center'>Erro encontrado: " . $exception->getMessage() . "</p>";
            }
        }
    }

    public function delete($id)
    {   
        $user = $this->userModel->find($id);

        $this->userModel->delete($user['id']);

        return redirect()->route('users_index');
    }

    public function redirectTo()
    {
        return redirect('users_login');
    }
}