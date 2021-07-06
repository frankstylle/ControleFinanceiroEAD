 -- tb_movimento, tb_usuario, tb_categoria
 
 SELECT 
	data_movimento,
    tipo_movimento,
    valor_movimento,
    nome_usuario,
    nome_categoria
FROM
	tb_movimento
INNER JOIN 
	tb_usuario
ON 
	tb_movimento.id_usuario = tb_usuario.id_usuario
INNER JOIN 
	tb_categoria
ON
	tb_movimento.id_categoria = tb_categoria.id_categoria;
    

















   -- tb_movimento, tb_usuario, tb_categoria
    
SELECT 
    data_movimento,
    tipo_movimento,
    valor_movimento,
    nome_usuario,
    nome_categoria
FROM
    tb_movimento
        INNER JOIN
    tb_categoria ON tb_categoria.id_categoria = tb_movimento.id_categoria
        INNER JOIN
    tb_usuario ON tb_movimento.id_usuario = tb_usuario.id_usuario
    
    
    
    
    
    
    
    
    
    
    
    
    
    