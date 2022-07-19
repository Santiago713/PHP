<?php
class Database
{
    private $servidorlocal;
    private $basededatos;
    private $usuario;
    private $password;
    private $charset;

    public function __construct()
        {
            $this->servidorlocal = 'localhost';
            $this->basededatos   = 'Ingreso';
            $this->usuario       = 'root';
            $this->clave         = '';
            $this->caracteres    = 'utf8';
        }
        function connect()
            {
                try
                    {
                    $connection = "mysql:host=".$this->servidorlocal.";dbname=".$this->basededatos.";charset=".$this->caracteres;
                    $opciones = [
                        PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_EMULATE_PREPARES  => false, ];
                    $pdo = new PDO($connection, $this->usuario, $this->clave,$opciones);
                    return $pdo;
                    }
                catch(PDOException $e)
                    {
                        print_r('Error en la conexion:  '.$e->getMessage());
                    }
            }
}
?>