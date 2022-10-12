<h1>Top 10 de Solicitudes</h1>
<hr>
<div class="containter">
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
