<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/estilos.css">

    <title>ESTUDIOS</title>
  </head>
  <body>

    <div class="container fondo">

        <h1 class="text-center">ESTUDIOS</h1>
        

        <div class="row">
            <div class="col-2 offset-10">
                <div class="text-center">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalUsuario" id="botonCrear">
                        <i class="bi bi-plus-circle-fill"></i> Crear
                        </button>
                </div>
            </div>
        </div>
        <br />
        <br />

        <div class="table-responsive">
            <table id="datos_usuario" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th style="display:collapse;">PersonId</th>
                        <th> Nombre Persona</th>
                        <th>Titulo</th>                                            
                        <th>Entidad educativa</th>   
                        <th>Fecha terminacion</th>        
                        <th>Editar</th>  
                        <th>Borrar</th>                
                    </tr>
                </thead>
            </table>
        </div>
   </div>


<!-- Modal -->
<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:658px"> 
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear estudio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
        <form method="POST" id="formulario" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-body">

                        <div class="col">                    
                            <label for="Nit">Escoge la persona</label>
                            <select name="PersonId" id="PersonId"  class="form-select" aria-label="Default select example">
                                <?php 
                                $mysqli = new mysqli('localhost', 'root', '', 'proyecto_final');                               
                                $query = $mysqli -> query ("SELECT * FROM person");
                                while ($resultado = mysqli_fetch_array($query)){
                                
                                    echo '<option value="'.$resultado[idPerson].'">'.$resultado[First_Name].'</option>';
                                }
                                ?>
                            </select>
                            <br />
                        </div>
                        

                        <div class="col"> 
                            <label for="First_Name">Ingrese el Titulo</label>
                            <input type="text" name="Job_Title" id="Job_Title" class="form-control">
                            <br />
                        </div>

                        <div class="row">                               
                            <div class="col"> 
                                <label for="First_Name">Ingrese la entidad educativa </label>
                                <input type="text" name="Educational_entity" id="Educational_entity" class="form-control">
                                <br />
                            </div>
                            <div class="col"> 
                                <label for="First_Name">Ingrese fecha de terminacion</label>
                                <input type="date" name="End_Date" id="End_Date" class="form-control">
                                <br />
                            </div>
                        </div>

                </div>

            </div>
            
            <div class="row">
                <div class="modal-footer">
                    <input type="hidden" name="idStudies" id="idStudies">
                    <input type="hidden" name="operacion" id="operacion">             
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">
                </div>
            </div>
        </form>
      </div>     
  </div>
</div>

    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#botonCrear").click(function(){
                $("#formulario")[0].reset();
                $(".modal-title").text("Crear Usuario");
                $("#action").val("Crear");
                $("#operacion").val("Crear");
                $("#imagen_subida").html("");
            });
            
            var dataTable = $('#datos_usuario').DataTable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                    url: "obtener_registros.php",
                    type: "POST"
                },
                "columnsDefs":[
                    {
                    "targets":[0, 3, 4],
                    "orderable":false,
                    },
                ],
                "language": {
                "decimal": "",
                "emptyTable": "No hay registros",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
            });
            
            //Aquí código inserción
            $(document).on('submit', '#formulario', function(event){
            event.preventDefault();
            var PersonId = $('#PersonId').val();
            var Job_Title = $('#Job_Title').val();
            var Educational_entity = $('#Educational_entity').val();
            var End_Date = $('#End_Date').val();
            
           
		    if(PersonId != '' && Job_Title != '' && Educational_entity != '')
                {
                    $.ajax({
                        url:"crear.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            $('#formulario')[0].reset();
                            $('#modalUsuario').modal('hide');
                            dataTable.ajax.reload();
                        }
                    });
                }
                else
                {
                    alert("Algunos campos son obligatorios");
                }
	        });



            //Funcionalida de editar
            $(document).on('click', '.editar', function(){		
            var idStudies = $(this).attr("idStudies");	           
            $.ajax({
                url:"obtener_registro.php",
                method:"POST",
                data:{idStudies:idStudies},
                dataType:"json",
                success:function(data)
                    {
                       
                        console.log(data);
                        $('#modalUsuario').modal('show');
                        $('#PersonId').val(data.PersonId);
                        $('#Job_Title').val(data.Job_Title);
                        $('#Educational_entity').val(data.Educational_entity);
                        $('#End_Date').val(data.End_Date);                                               
                        $('#idStudies').val(data.idStudies);          
                        $('.modal-title').text("Editar Usuario");                                                               
                        $('#action').val("Editar");
                        $('#operacion').val("Editar");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    }
                })
	        });

            //Funcionalida de borrar
            $(document).on('click', '.borrar', function(){
                var idStudies = $(this).attr("idStudies");
                if(confirm("Esta seguro de borrar este registro:" + idStudies))
                {
                    $.ajax({
                        url:"borrar.php",
                        method:"POST",
                        data:{idStudies:idStudies},
                        success:function(data)
                        {
                            alert(data);
                            dataTable.ajax.reload();
                        }
                    });
                }
                else
                {
                    return false;	
                }
            });

        });         
    </script>
    
  </body>
</html>

