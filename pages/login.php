
<div class="container-fluid justify-content-center p-0 mb-5" id="pagina">

    <div class="justify-content-center d-flex mt-5">
        <h1 class="text-center">Bem-vindo a pizzaria do Luigi!</h1>
    </div>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <!-- <img src="" id="icon" alt="User Icon" /> -->
            </div>

            <div class="container">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="email">
                <input type="password" id="senha" class="fadeIn third" name="senha" placeholder="senha">
                <input type="submit" class="fadeIn fourth" onclick="ValidaLogin()">
            </div>

            <div id="formFooter">
                <a class="underlineHover" href="#">Esqueceu a senha?</a>
            </div>

        </div>
    </div>
</div>
<script>
    function ValidaLogin(){
        var login = $("#login").val();
        var senha = $("#senha").val();

        $.ajax({
            type: "POST",
            url:  "Controle/ValidaCliente.php",
            data: {email: login, senha: senha},
            success: function(result) {
                if (result = 1) {
                    alert("Login bem sucedido");
                    $("#body").load("Visao/PaginaTeste.php");
                }
                else{
                    alert("ALgo de Errado com o login");  
                }      
            }
        })
    }
</script>