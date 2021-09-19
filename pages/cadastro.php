
<div class="container-fluid justify-content-center p-0 mb-5" id="pagina">

<div class="justify-content-center d-flex mt-5">
    <h1 class="text-center">Bem-vindo a pizzaria do Luigi!</h1>
</div>

<div class="wrapper fadeInDown">
    <div id="formContent">
        <div class="fadeIn first">
            <!-- <img src="" id="icon" alt="User Icon" /> -->
        </div>

        <form method="post" action="../Controle/ControleCliente.php">
            <input type="text" id="cpf"  name="cpf" placeholder="CPF">
            <input type="text" id="email"  name="email" placeholder="email">
            <input type="text" id="nome" name="nome" placeholder="nome">
            <input type="password" id="password" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Cadastrar">
        </form>

    </div>
</div>
</div>