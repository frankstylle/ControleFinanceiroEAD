 -- COMANDO PARA INSERIR
 -- insert into nome_da_tabela (colunas) values (valores)
 
 INSERT INTO tb_usuario
 (nome_usuario, email_usuario, senha_usuario, data_cadastro)
 VALUES
 ('Ana Maria','ana@gmail.com','senha123','2021-02-21');
 
 INSERT INTO tb_usuario
 (nome_usuario, email_usuario, senha_usuario, data_cadastro)
 VALUES
 ('Carlos Junior', 'calor@gmail.com' , '44510', '2021-02-25');
 
 INSERT INTO tb_usuario
 (nome_usuario, email_usuario, senha_usuario, data_cadastro)
 VALUES
 ('Alexandre Junior', 'ale@gmail.com' , '3323', '2021-02-27');
 
 
 INSERT INTO tb_categoria
 (nome_categoria, id_usuario)
 VALUES
 ('Alimentação', 1);
 
 INSERT INTO tb_categoria
 (nome_categoria, id_usuario)
 VALUES
 ('Viagens', 2);
 
 INSERT INTO tb_empresa
 (nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
 VALUES
 ('Empresa Colchão', '43996109054', 'Rua dos Colchões', 1);
 
 INSERT INTO tb_empresa
 (nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
 VALUES
 ('Empresa Comer Bem', '55995689625', 'Rua dos restaurantes', 2);
 
 INSERT INTO tb_conta
 (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
 VALUES
 ('Santander', '1122', '112233', 4500.20, 1);
 
 INSERT INTO tb_conta
 (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
 VALUES
 ('Bradesco', '4433', '335566', 5678.89, 2);
 
INSERT INTO tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
VALUES
(1, '2021-01-10', 45, null, 1, 1, 1, 1);
 
 