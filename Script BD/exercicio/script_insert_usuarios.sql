select * from tb_usuario

INSERT INTO tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
VALUES
('Anderson dias', 'anderson@gmail.com', 'anderson123', '2021-05-20');

INSERT INTO tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
VALUES
('Marcos antonio', 'marcos@gmail.com', 'marcos123', '2021-05-21');

INSERT INTO tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
VALUES
('Rayssa silva', 'raysa@gmail.com', 'raysa123', '2021-05-22');

INSERT INTO tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
VALUES
('Cecilia Azumaki', 'cecilia@gmail.com', 'cecilia123', '2021-05-23');

INSERT INTO tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
VALUES
('Bruno Mendes', 'bruno@hotmail', 'bruno123', '2021-05-26');

delete from tb_usuario WHERE id_usuario = 1;
delete from tb_usuario WHERE id_usuario = 2;