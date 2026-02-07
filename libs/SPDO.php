<?php
// Clase que hereda de PDO y utiliza el patrón Singleton
class SPDO extends PDO
{
    // Atributo para la instancia única
    private static $instancia = null;

   public function __construct()
{
    // getenv() es más compatible con la configuración de Railway
    $host = getenv('MYSQLHOST');
    $db   = getenv('MYSQLDATABASE');
    $user = getenv('MYSQLUSER');
    $pass = getenv('MYSQLPASSWORD');
    $port = getenv('MYSQLPORT') ?: '3306';

    // Si getenv falla, intentamos con $_SERVER como plan B
    if (!$host) {
        $host = $_SERVER['MYSQLHOST'] ?? 'localhost';
        $db   = $_SERVER['MYSQLDATABASE'] ?? '';
        $user = $_SERVER['MYSQLUSER'] ?? '';
        $pass = $_SERVER['MYSQLPASSWORD'] ?? '';
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


