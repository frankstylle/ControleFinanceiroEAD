-- tb_categoria, tb_empresa, tb_usuario, tb_movimento

SELECT 
	nome_categoria,
    nome_empresa,
    nome_usuario,
    data_movimento,
    valor_movimento,
    email_usuario
FROM 
	tb_movimento
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
	tb_movimento.id_usuario = tb_usuario.id_usuario;
