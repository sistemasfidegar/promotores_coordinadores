<div class="box">     
        <div class="box-body table-responsive">	
			<div id="lista">
			    <table id="dtUsuarios" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" border="1" style="min-width:612px; width:100%;">
			        <thead style="font-size:13px;">
			            <tr style="background:#606060; color:#ffffff;">
			                <th style="vertical-align:middle; text-align:center; width: 10px;">#</th>
			                <th style="vertical-align:middle;">Nombre</th>
			                <th style="vertical-align:middle; text-align:left;">Usuario</th>
			                <th style="vertical-align:middle; text-align:center;">Correo</th>
			                <th style="vertical-align:middle; text-align:center;">Delegación</th>
			                <th style="vertical-align:middle; text-align:center;">Perfil</th>
			                <th style="vertical-align:middle; text-align:center;">Estatus</th>
			            </tr>
			        </thead>
			        <tbody style="font-size:12px;">
			            <?php
			            $index = 1;
			            foreach ($usuarios as $i => $value) {
			                $ruta_edicion = base_url() . "index.php/administrador/editarUsuario/" . $value['id_usuario'];
			                ?>	                                                                                             
			                <tr style="cursor:pointer;">
			                    <td onclick="location.href = '<?php echo $ruta_edicion; ?>'">
			                        <?php echo $index; ?>
			                    </td> 
			                    			                   			
			                    <td onclick="location.href = '<?php echo $ruta_edicion; ?>'">
			                        <?php echo $value['nombre'] . " " . $value['paterno'] . " " . $value['materno']; ?>
			                    </td> 
			                    
			                     <td onclick="location.href = '<?php echo $ruta_edicion; ?>'">
			                        <?php echo $value['usuario']; ?>
			                    </td>                                                      
			
			                    <td onclick="location.href = '<?php echo $ruta_edicion; ?>'">
			                        <?php echo $value['email']; ?>
			                    </td>  
			                    <td onclick="location.href = '<?php echo $ruta_edicion; ?>'">
			                        <?php 
			                        if($value['id_delegacion']!=0)
			                        	echo $value['delegacion'];
			                        else 
			                        	echo "N/A";
			                        
			                        ?>
			                    </td>  
			
			                    <td onclick="location.href = '<?php echo $ruta_edicion; ?>'">
			                        <?php echo $value['perfil']; ?>
			                    </td> 
			
			                    <td width="85px" align="center" onclick="location.href = '<?php echo $ruta_edicion; ?>'">
			                        <?php
			                        if ($value['activo']=='t') {
			                            echo "Activo";
			                        } else {
			                            echo "Baja";
			                        }
			                        ?>
			                    </td>     
			
			                </tr>
					    <?php
						    $index++;
						}
						?>	
			        </tbody>
			    </table>
			</div>
	</div>
</div>

<script>

$(document).ready(function() {
    $('#dtUsuarios').DataTable({
    	"columnDefs": [
                       {"searchable": false, "targets": [0, 6]},
                       {"sortable": false, "targets": [6]}
                   ]

    });


    
});


</script>