<?php
// Clase que hereda de PDO y utiliza el patrón Singleton
class SPDO extends PDO
{
    // Atributo para la instancia única
    private static $instancia = null;

  public function __construct()
{
    // Buscamos las variables en los dos sitios posibles
    $host = $_SERVER['MYSQLHOST'] ?? getenv('MYSQLHOST');
    $db   = $_SERVER['MYSQLDATABASE'] ?? getenv('MYSQLDATABASE');
    $user = $_SERVER['MYSQLUSER'] ?? getenv('MYSQLUSER');
    $pass = $_SERVER['MYSQLPASSWORD'] ?? getenv('MYSQLPASSWORD');
    $port = $_SERVER['MYSQLPORT'] ?? getenv('MYSQLPORT') ?: '3306';

    // Si después de buscar en ambos sitios sigue vacío, lanzamos el aviso
    if (!$host || !$db || !$user) {
        throw new Exception("Error: El servidor no está pasando las variables. Revisa la pestaña 'Variables' en Railway.");
    }

    $dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8";
    parent::__construct($dsn, $user, $pass);
}
    // Método Singleton para obtener la instancia
    public static function singleton()
    {
        if (self::$instancia == null) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }
}
?>




