<h1>Indicadores</h1>

<div class="row">
    <div class="col-md-3">
    <div class="panel panel-info">
    <div class="panel-heading"># Usuarios</div>
    <div class="panel-body">
    <?php foreach ($count_user as $data) {?>
        <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $data['count_user'];?></h1>
        <?php } ?> 
    </div>

    </div>
    </div>
    <div class="col-md-3">
    <div class="panel panel-warning">
    <div class="panel-heading"># Solicitudes</div>
    <div class="panel-body">
        <h1><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> 20</h1>
    </div>
    </div>  
    </div>
    <div class="col-md-3">
    <div class="panel panel-danger">
    <div class="panel-heading"># Ticket Abiertos</div>
    <div class="panel-body">
        <h1><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> 20</h1>
    </div>
    </div>  
    </div>   

    <div class="col-md-3">
    <div class="panel panel-success">
    <div class="panel-heading"># Ticket Cerrados</div>
    <div class="panel-body">
        <h1><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> 20</h1>
    </div>
    </div>  
    </div>  
    </div>
</div>


<div class="container">
<h1>Top 10 de Solicitudes por usuario</h1>
<hr>
<table class="table table-hover">
                <thead>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Grado</th>
                    <th>Solicitudes</th>
                </thead>
            <?php foreach ($data_user as $data) {?>
                <tbody>
                    <tr>
                        <td><img width="30px" class="img-circle" src="<?php echo base_url() . 'assets/images/avatar.png'?>" alt="img"></td>
                        <td><?php echo $data['lastname'];?>,<?php echo $data['firstname'];?></td>
                        <td><?php echo $data['grade'];?></td>
                        <td><?php echo $data['total_ticket'];?></td>
                    </tr>
                </tbody>
            <?php } ?>  
                </table>
       

</div> 
