<?php

// Configurações do SITE
define('HOST', 'localhost'); // IP
define('USER', 'root'); // Usuario
define('PASS', ''); // Senha
define('DB', 'db_financeiro_ead_clone'); // Banco
/**
 *  Conexao.class TIPO [Conexão]
 * Descricao: Estabelece conexões com o banco usando SingleTon
 * @copyright (c) year, WMBarros
 */

class Conexao
{

    /** @var PDO */
    private static $Connect;

    private static function Conectar()
    {
        try {

            // Verificar se a conexão não existe
            if (self::$Connect == null) :

                $dsn = 'mysql:host=' . HOST . ';dbname=' . DB;
                self::$Connect = new PDO($dsn, USER, PASS, null);
            endif;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        // Setar os atributos para que seja retornado as excessões do banco
        self::$Connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        return self::$Connect;
    }

    public function retornarConexao() {
        return self::Conectar();
    }
}
