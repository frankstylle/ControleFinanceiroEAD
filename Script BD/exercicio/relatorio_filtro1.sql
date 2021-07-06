-- tb_usuario, tb_categoria

SELECT 
	nome_usuario,
    nome_categoria
FROM
	tb_usuario
INNER JOIN 
	tb_categoria
ON
	tb_usuario.id_usuario = tb_categoria.id_usuario
WHERE 
	nome_usuario LIKE '%a%';