<?php
require_once '../DAO/Conexao.php';
require_once '../DAO/UtilDAO.php';

class CategoriaDAO  extends Conexao
{

    public function CadastrarCategoria($nomeCategoria)
    {
        if (trim($nomeCategoria) == '') {
            return 0;
        }
        $conexao = parent::retornarConexao();

        $comando_sql = 'INSERT INTO tb_categoria 
                        (nome_categoria, id_usuario)
                        VALUES (?, ?)';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nomeCategoria);
        $sql->bindValue(2, UtilDAO::UsuarioLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarCategoria()
    {

        $conexao = parent::retornarConexao();

        $comando_sql = 'SELECT id_categoria,
                               nome_categoria
                          FROM tb_categoria
                         WHERE id_usuario = ?
                      ORDER BY nome_categoria ASC';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::UsuarioLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharCategoria($idCategoria)
    {

        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT id_categoria,
                               nome_categoria
                          FROM tb_categoria
                         WHERE id_categoria = ?
                           AND id_usuario = ? ';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idCategoria);
        $sql->bindValue(2, UtilDAO::UsuarioLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function AlterarCategoria($nome, $idCategoria)
    {

        if (trim($nome) == '' || $idCategoria == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'UPDATE tb_categoria
                           SET nome_categoria = ?
                         WHERE id_categoria = ? 
                           AND id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $idCategoria);
        $sql->bindValue(3, UtilDAO::UsuarioLogado());

        try {
            $sql->execute();
            return 2;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ExcluirCategoria($idCategoria)
    {
        if ($idCategoria == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();
        $comando_sql = 'DELETE FROM tb_categoria
                              WHERE id_categoria = ?
                                AND id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idCategoria);
        $sql->bindValue(2, UtilDAO::UsuarioLogado());

        try {
            $sql->execute();
            return 5;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -4;
        }
    }
}
