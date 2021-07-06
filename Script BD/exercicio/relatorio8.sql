-- tb_banco, tb_categoria, tb_empresa, tb_usuario, tb_movimento

SELECT
	banco_conta,
    numero_conta,
    nome_categoria,
    nome_empresa,
    nome_empresa,
    nome_usuario,
    data_movimento,
    valor_movimento
FROM
	tb_movimento
INNER JOIN
	tb_conta
ON
	tb_movimento.id_conta = tb_conta.id_conta
INNER JOIN 
	tb_categoria
ON
	tb_movimento.id_categoria = tb_categoria.id_categoria
INNER JOIN
	tb_empresa
ON
	tb_movimento.id_empresa = tb_empresa.id_empresa
INNER JOIN
	tb_usuario
ON
	tb_movimento.id_usuario = tb_usuario.id_usuario
