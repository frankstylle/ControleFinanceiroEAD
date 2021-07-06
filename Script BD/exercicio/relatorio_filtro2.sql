-- tb_usuario, tb_categoria
SELECT 
	nome_usuario,
    nome_categoria
FROM 
	tb_categoria
INNER JOIN 
	tb_usuario
ON
	tb_categoria.id_usuario = tb_usuario.id_usuario
WHERE 
	tb_categoria.id_usuario = 5;
    