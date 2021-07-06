SELECT 
	data_movimento, tipo_movimento, valor_movimento, nome_usuario
FROM
	tb_movimento
INNER JOIN
	tb_usuario
ON
	tb_movimento.id_usuario = tb_usuario.id_usuario;