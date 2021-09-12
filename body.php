<div class="container" id="pagina">
    <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#consulta" aria-expanded="false" aria-controls="consulta"> consultar banco </button>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#insercao" aria-expanded="false" aria-controls="insercao"> inserir no banco</button>
    </p>

<?php
include 'Modelo/Mesa.php';
$mesas = new Mesa();
$mesa = $mesas->getMesa(1);
?>
   <!-- colapses dos botões acima -->
    <div class="collapse" id="consulta" data-parent="#pagina">
        <div class="card card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">nome</th>
                        <th scope="col">status</th>
                        <th scope="col">garçom</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo  $mesa["Id"]?></td>
                        <td><?php echo  $mesa["Id_Garcom"]?></td>
                        <td><?php echo  $mesa["Status"]?></td>
                        <td><?php echo  $mesa["Id_Pedidos"]?></td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>

    <div class="collapse" id="insercao" data-parent="#pagina">
        <div class="card card-body">
           insercao aqui
        </div>
    </div>

</div>
