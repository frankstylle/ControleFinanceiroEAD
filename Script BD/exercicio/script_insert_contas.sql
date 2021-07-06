SELECT * FROM tb_conta;

INSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
VALUES
('ITAU', '2569', '11828-4', 500, 5);

INSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
VALUES
('ORIGINAL', '3035', '25698-8', 250, 5);

INSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
VALUES
('HSBC', '4585', '24695-8', 3200.50, 6);

INSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
VALUES
('ITAU', '7484', '45218-8', 1528.90, 6);

INSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
VALUES
('SICOOB', '4589', '14258-9', 1750.20, 7);

INSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
VALUES
('NUBANK', '2535', '22325-8', 2300, 7);

INSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
VALUES
('BRADESCO', '1452', '12359-8', 1850.50, 8);

INSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
VALUES
('ITAU', '2232', '55889-2', 850, 8);

INSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
VALUES
('BRADESCO', '1145', '56829-5', 1450, 9);

INSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
VALUES
('SANTANDER', '4785', '45895-8', 990.50, 9);

delete from tb_conta where id_usuario = 1;
delete from tb_conta where id_usuario = 2;