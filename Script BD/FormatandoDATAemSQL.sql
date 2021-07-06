SELECT id_movimento,
                              DATE_FORMAT(data_movimento,'%d/%m/%Y') as data_movimento,
                              tipo_movimento ,
                              nome_categoria,
                              nome_empresa,
                              banco_conta,
                              valor_movimento,
                              obs_movimento,
                              tb_usuario.id_usuario
                         FROM tb_movimento
                   INNER JOIN tb_categoria
                           ON tb_movimento.id_categoria = tb_categoria.id_categoria
                   INNER JOIN tb_empresa
                           ON tb_movimento.id_empresa = tb_empresa.id_empresa
                   INNER JOIN tb_conta
                           ON tb_movimento.id_conta = tb_conta.id_conta
                INNER JOIN tb_usuario
                        ON tb_movimento.id_usuario = tb_usuario.id_usuario
                     WHERE tb_usuario.id_usuario = 7