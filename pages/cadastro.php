

<?php

    unset($_POST);
    var_dump($_POST);
?>
<div class="container-fluid justify-content-center p-0 mb-5" id="pagina">

<div class="justify-content-center d-flex mt-5">
    <h3 class="text-center">Bem-vindo a pizzaria do Luigi!</h3>
</div>

<div class="wrapper fadeInDown">
    <div id="formContent">
        <div class="fadeIn first">
            <!-- <img src="" id="icon" alt="User Icon" /> -->
        </div>

        <div class="container" id="cliente" name="cliente" >
            <input type="text" id="cpf"  name="cpf" placeholder="CPF">
            <input type="text" id="email"  name="email" placeholder="email">
            <input type="text" id="nome" name="nome" placeholder="nome" value="nome">
            <input type="password" id="senha" name="senha" placeholder="senha">
            <input type="submit" id="Cadastrar" name="Cadastrar" class="fadeIn fourth" onclick="Cadastrar()">
        </div>

    </div>
</div>
</div>

<script>
    function Cadastrar() {

        var cpf = $('#cpf').val();
        var email = $('#email').val();
        var nome = $('#nome').val();
        var senha = $('#senha').val();

        $.ajax({

            type: "POST",
            url:  "Controle/InsereBanco.php",
            data: {cpf: cpf, email: email, nome: nome, senha: senha},
            success: function(result) {
                alert(result);
                $("#body").load("pages/login.php");
            }
        });
    }
</script>