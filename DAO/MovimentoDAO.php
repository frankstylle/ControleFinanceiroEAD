<?php
require_once '../DAO/Conexao.php';
require_once '../DAO/UtilDAO.php';

class MovimentoDAO extends Conexao
{

    public function RealizarMovimento($tipo, $data, $valor, $id_categoria, $id_empresa, $id_conta, $obs)
    {
        if ($tipo == '' || trim($data) == '' || trim($valor) == '' || $id_categoria == '' || $id_empresa == '' || $id_conta == '') {
            return 0;
        }
        $conexao = parent::retornarConexao();
        $comando_sql = 'INSERT INTO tb_movimento (tipo_movimento,
                                                  data_movimento,
                                                  valor_movimento,
                                                  id_categoria,
                                                  id_empresa,
                                                  id_conta,
                                                  obs_movimento,
                                                  id_usuario)
                                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)
                                                  ';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $tipo);
        $sql->bindValue(2, $data);
        $sql->bindValue(3, $valor);
        $sql->bindValue(4, $id_categoria);
        $sql->bindValue(5, $id_empresa);
        $sql->bindValue(6, $id_conta);
        $sql->bindValue(7, $obs);
        $sql->bindValue(8, UtilDAO::UsuarioLogado());

        $conexao->beginTransaction();

        try {

            //Inserção na tb_movimento
            $sql->execute();

            if ($tipo == 1) {
                $comando_sql = 'UPDATE tb_conta 
                                SET saldo_conta = saldo_conta + ? 
                                WHERE id_conta = ?';
            } else if ($tipo == 2) {
                $comando_sql = 'UPDATE tb_conta 
                                SET saldo_conta = saldo_conta - ? 
                                WHERE id_conta = ?';
            }

            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1, $valor);
            $sql->bindValue(2, $id_conta);

            // Atualiza o saldo da conta
            $sql->execute();

            $conexao->commit();

            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $conexao->rollBack();
            return -1;
        }
    }
    public function ConsultarMovimento($tipo, $dataInicial, $dataFinal)
    {
        if (trim($dataInicial) == '' || trim($dataFinal) == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();
                                
        $comando_sql = " SELECT id_movimento,
                                tipo_movimento,
                                tb_movimento.id_conta,
                                DATE_FORMAT(data_movimento,'%d/%m/%Y') as data_movimento,
                                valor_movimento,
                                nome_categoria,
                                nome_empresa,
                                banco_conta,
                                numero_conta,
                                agencia_conta,
                                obs_movimento
                          FROM  tb_movimento
                    INNER JOIN  tb_categoria
                            ON  tb_categoria.id_categoria = tb_movimento.id_categoria
                    INNER JOIN  tb_empresa
                            ON  tb_empresa.id_empresa = tb_movimento.id_empresa 
                    INNER JOIN  tb_conta
                            ON  tb_conta.id_conta = tb_movimento.id_conta 
                         WHERE  tb_movimento.id_usuario = ? 
                           AND  tb_movimento.data_movimento BETWEEN ? AND ?";

        if ($tipo != 0) {

            $comando_sql = $comando_sql . ' AND tipo_movimento = ?';
        }

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        
        $sql->bindValue(1, UtilDAO::UsuarioLogado());
        $sql->bindValue(2, $dataInicial);
        $sql->bindValue(3, $dataFinal);
        if ($tipo != 0) {
            $sql->bindValue(4, $tipo);
        }

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function ExcluirMovimento($idMovimento, $idConta, $valor, $tipo)
    {
        if ($idMovimento == '' || $idConta == '' || $valor == '' || $tipo == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'DELETE FROM tb_movimento where id_movimento = ?
                                                   and id_usuario = ? ';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idMovimento);
        $sql->bindValue(2, UtilDAO::UsuarioLogado());

        $conexao->BeginTransaction();

        try {

            //Deleta o registro
            $sql->execute();

            if ($tipo == 1) {
                $comando_sql = 'UPDATE tb_conta 
                                SET saldo_conta = saldo_conta - ?
                                WHERE id_conta = ?';
            } else if ($tipo == 2) {
                $comando_sql = 'UPDATE tb_conta 
                                SET saldo_conta = saldo_conta + ?
                                WHERE id_conta = ?';
            }

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, $valor);
            $sql->bindValue(2, $idConta);

            //Atualiza o saldo
            $sql->execute();

            $conexao->commit();

            return 1;
        } catch (Exception $ex) {
            $conexao->rollBack();
            echo $ex->getMessage();
            return -1;
        }
    }
}
