SELECT
	nome_usuario, banco_conta, saldo_conta, numero_conta, email_usuario
FROM
	tb_conta
INNER JOIN 
	tb_usuario
ON
	tb_usuario.id_usuario = tb_conta.id_usuario