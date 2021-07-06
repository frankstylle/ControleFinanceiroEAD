function ValidarMeusDados() {
    var nome = document.getElementById("nome").value;
    var email = $("#email").val();

    if (nome.trim() == '') {
        alert("Preencher o campo NOME");
        $("#nome").focus();
        $("#divNome").addClass("has-error")
        return false;
    } else {
        $("#divNome").removeClass("has-error").addClass("has-success");
    }
    if (email.trim() == '') {
        alert("Preencher o campo EMAIL");
        $("#divEmail").addClass("has-error");
        $("#email").focus();
        return false;
    } else {
        $("#divEmail").removeClass("has-error").addClass("has-success");
    }
}

function ValidarCategoria() {
    var categoria = $("#categoria").val();

    if ($("#categoria").val().trim() == '') {
        alert("Preencher o campo NOME DA CATEGORIA");
        $("#categoria").focus();
        $("#divCategoria").addClass("has-error");
        return false;
    } else {
        $("#divCategoria").removeClass("has-error").addClass("has-success");
    }
}

function ValidarEmpresa() {

    if ($("#nomeEmpresa").val().trim() == '') {
        alert("Preencher o campo NOME DA EMPRESA");
        $("#nomeEmpresa").focus();
        $("#divNomeEmpresa").addClass("has-error");
        return false;
    } else {
        $("#divNomeEmpresa").removeClass("has-error").addClass("has-success");
    }

}

function ValidarConta() {

    if ($("#banco").val().trim() == '') {
        alert("Preencher o campo NOME DO BANCO");
        $("#banco").focus();
        $("#divBanco").addClass("has-error");
        return false;
    } else {
        $("#divBanco").removeClass("has-error").addClass("has-success");
    }

    if ($("#agencia").val().trim() == '') {
        alert("Preencher o campo AGENCIA");
        $("#agencia").focus();
        $("#divAgencia").addClass("has-error");
        return false;
    } else {
        $("#divAgencia").removeClass("has-error").addClass("has-success");
    }

    if ($("#numero").val().trim() == '') {
        alert("Preencher o campo NÚMERO DA CONTA");
        $("#numero").focus();
        $("#divNumero").addClass("has-error");
        return false;
    } else {
        $("#divNumero").removeClass("has-error").addClass("has-success");
    }

    if ($("#saldo").val().trim() == '') {
        alert("Preencher o campo SALDO");
        $("#saldo").focus();
        $("#divSaldo").addClass("has-error");
        return false;
    } else {
        $("#divSaldo").removeClass("has-error").addClass("has-success");
    }
}

function ValidarMovimento() {

    if ($("#tipo").val() == '') {
        alert("Selecione o TIPO");
        $("#tipo").focus();
        $("#divTipo").addClass("has-error");
        return false;
    } else {
        $("#divTipo").removeClass("has-error").addClass("has-success");
    }

    if ($("#data").val() == '') {
        alert("Selecione uma DATA");
        $("#data").focus();
        $("#divData").addClass("has-error");
        return false;
    } else {
        $("#divData").removeClass("has-error").addClass("has-success");
    }

    if ($("#valor").val() == '') {
        alert("Digite um VALOR");
        $("#valor").focus();
        $("#divValor").addClass("has-error");
        return false;
    } else {
        $("#divValor").removeClass("has-error").addClass("has-success");
    }

    if ($("#categoria").val() == '') {
        alert("Selecione uma CATEGORIA");
        $("#categoria").focus();
        $("#divCategoria").addClass("has-error");
        return false;
    } else {
        $("#divCategoria").removeClass("has-error").addClass("has-success");
    }

    if ($("#empresa").val() == '') {
        alert("Selecione uma EMPRESA");
        $("#empresa").focus();
        $("#divEmpresa").addClass("has-error");
        return false;
    } else {
        $("#divEmpresa").removeClass("has-error").addClass("has-success");
    }

    if ($("#conta").val() == '') {
        alert("Selecione uma CONTA");
        $("#conta").focus();
        $("#divConta").addClass("has-error");
        return false;
    } else {
        $("#divConta").removeClass("has-error").addClass("has-success");
    }

}

function ValidarConsultarPeriodo() {
    if ($("#data_inicial").val().trim() == '') {
        alert('Preencher o campo DATA INICIAL');
        $("#data_inicial").focus();
        $("#divInicial").addClass("has-error");
        return false;
    } else {
        $("#divInicial").removeClass("has-error").addClass("has-success");
    }

    if ($("#data_final").val().trim() == '') {
        alert('Preencher o campo DATA FINAL');
        $("#data_final").focus();
        $("#divFinal").addClass("has-error");
        return false;
    } else {
        $("#divFinal").removeClass("has-error").addClass("has-success");
    }
}

function ValidarLogin() {

    if ($("#email").val().trim() == '') {
        alert("Preencher o campo E-MAIL");
        $("#email").focus();
        $("#divEmail").addClass("has-error");
        return false;
    } else {
        $("#divEmail").removeClass("has-error").addClass("has-success");
    }

    if ($("#senha").val().trim() == '') {
        alert("Preencher o campo SENHA");
        $("#senha").focus();
        $("#divSenha").addClass("has-error");
        return false;
    } else {
        $("#divSenha").removeClass("has-error").addClass("has-success");
    }
}

function ValidarCadastro() {
    if ($("#nome").val().trim() == '') {
        alert("Preencher o campo NOME");
        $("#nome").focus();
        $("#divNome").addClass("has-error");
        return false;
    } else {
        $("#divNome").removeClass("has-error").addClass("has-success");
    }

    if ($("#email").val().trim() == '') {
        alert("Preencher o campo E-MAIL");
        $("#email").focus();
        $("#divEmail").addClass("has-error");
        return false;
    } else {
        $("#divEmail").removeClass("has-error").addClass("has-success");
    }

    if ($("#senha").val().trim() == '') {
        alert("Preencher o campo SENHA");
        $("#senha").focus();
        $("#divSenha").addClass("has-error");
        return false;
    } else {
        $("#divSenha").removeClass("has-error").addClass("has-success");
    }

    if ($("#senha").val().trim().length < 6) {
        alert("A senha deverá conter no mínimo 6 caracteres");
        $("#senha").focus();
        $("#divSenha").addClass("has-error");
        return false;
    } else {
        $("#divSenha").removeClass("has-error").addClass("has-success");
    }


    if ($("#senha").val().trim() != $("#rsenha").val().trim()) {
        alert("O campo SENHA e REPETIR SENHA deverão ser iguais");
        $("#rsenha").focus();
        $("#divRsenha").addClass("has-error");
        return false;
    } else {
        $("#divRsenha").removeClass("has-error").addClass("has-success");
    }


}