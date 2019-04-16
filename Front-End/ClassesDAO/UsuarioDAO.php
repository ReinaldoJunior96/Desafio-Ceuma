<?php
require_once('conexao.php');

class UsuarioDAO extends PDOconectar
{
    public $conn = null;

    function __construct()
    {
        $this->conn = PDOconectar::Conectar();
    }

    public function Login($email, $senha)
    {
        try {
            $Validar = $this->conn->prepare("SELECT * FROM usuario WHERE usuario='$email' AND senha='$senha'");
            $Validar->execute();
            $linhas = $Validar->fetchAll(PDO::FETCH_OBJ);
            if ($Validar->rowCount() >= 1) {
                foreach ($linhas as $listar) {
                    $code_user = $listar->id;
                    $usuario = $listar->usuario;
                    $senha = $listar->senha;
                }
                session_start();
                $_SESSION['code_user'] = $code_user;
                $_SESSION['usuario'] = $usuario;
                $_SESSION['senha'] = $senha;
                echo "<script language=\"javascript\">window.location.href = 'Menu.php'</script>";
            } elseif ($Validar->rowCount() <= 0) {
                echo "Usuário Inválido";
            }
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }
}

?>