SELECT 
	nome_usuario, nome_empresa, telefone_empresa, endereco_empresa
FROM 
	tb_empresa
INNER JOIN 
	tb_usuario
ON
	tb_usuario.id_usuario = tb_empresa.id_usuario