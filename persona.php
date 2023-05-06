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

    <title>PERSONAS</title>
  </head>
  <body>

    <div class="container fondo">

        <h1 class="text-center">REGISTRO DE PERSONAS</h1>
        

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
                        <th>Nit</th>
                        <th>Nombres </th>
                        <th>Apellidos</th>                                            
                        <th>Teléfono</th>   
                        <th>Email</th>                      
                        <th>Genero</th>
                        <th>Nacionalidad</th>      
                        <th>Estado Civil</th>      
                        <th>Cumpleaños</th>
                        <th>RH</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Crear Persona</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
        <form method="POST" id="formulario" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="row">
                        <div class="col">                    
                            <label for="Nit">Ingrese el Nit</label>
                            <input type="text" name="Nit" id="Nit" class="form-control">
                            <br />
                        </div>
                        

                        <div class="col"> 
                            <label for="First_Name">Ingrese el Primer Nombre</label>
                            <input type="text" name="First_Name" id="First_Name" class="form-control">
                            <br />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col"> 
                            <label for="Second_Name">Ingrese el Segundo Nombre</label>
                            <input type="text" name="Second_Name" id="Second_Name" class="form-control">
                            <br />
                        </div>

                        <div class="col"> 
                            <label for="SurName">Ingrese el Primer Apellido</label>
                            <input type="text" name="SurName" id="SurName" class="form-control">
                            <br />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col"> 
                            <label for="SecondSurname">Ingrese el Segundo Apellido</label>
                            <input type="text" name="SecondSurname" id="SecondSurname" class="form-control">
                            <br />  
                        </div>
                        
                        <div class="col"> 
                            <label for="Telephone">Ingrese el teléfono</label>
                            <input type="text" name="Telephone" id="Telephone" class="form-control">
                            <br />
                        </div>
                    </div>

                <div class="row">   
                    <div class="col"> 
                        <label for="email">Ingrese el email</label>
                        <input type="email" name="Email" id="Email" class="form-control">
                        <br />
                    </div>
                    <div class="col"> 
                        <label for="Birthday">Fecha de Nacimiento</label>
                        <input type="date" name="Birthday" id="Birthday" class="form-control">
                        <br />
                      
                    </div>                
                </div>
            <div class="row">
                 <div class="col"> 
                    <label for="email">Tipo de Sangre</label>
                    <input type="text" name="RH" id="RH" class="form-control">
                    <br />
                </div>   
                <div class="col">
                 <legend class="col-form-label col-sm-4 pt-0">Genero</legend>
                 <fieldset class="form-group">
                    <div class="row">
                    
                    <div class="col-sm-10">
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="Gender" id="Gender1" value="1" >
                        <label class="form-check-label" for="gridRadios1">
                        Femenino
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="Gender" id="Gender2" value="2">
                        <label class="form-check-label" for="gridRadios2">
                               Masculino
                        </label>
                        </div>                   
                    </div>
                    </div>
                </fieldset>       
                </div>    
            </div>

            <div class="row">                                                         
                
                <div class="col">       
                <legend class="col-form-label col-sm-3 pt-0">Nacionalidad</legend>
                <fieldset class="form-group">
                    <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0"></legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="Nacionality" id="Nacionality1" value="1" >
                        <label class="form-check-label" for="gridRadios3">
                            Colombiano
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="Nacionality" id="Nacionality2" value="2">
                        <label class="form-check-label" for="gridRadios4">
                            Extranjero
                        </label>
                        </div>                   
                    </div>
                    </div>
                </fieldset>      
                </div>           
                <div class="col">
                 <legend class="col-form-label col-sm-4 pt-0">Estado Civil</legend>
                 <fieldset class="form-group">
                    <div class="row">
                    
                    <div class="col-sm-10">
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="Marital_Status" id="Marital_Status1" value="1" >
                        <label class="form-check-label" for="Marital_Status">
                            Soltero
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="Marital_Status" id="Marital_Status2" value="2">
                        <label class="form-check-label" for="Marital_Status">
                            Casado
                        </label>
                        </div>    
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="Marital_Status" id="Marital_Status3" value="3">
                        <label class="form-check-label" for="Marital_Status">
                        Separado
                        </label>
                        </div> 
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="Marital_Status" id="Marital_Status4" value="4">
                        <label class="form-check-label" for="Marital_Status">
                            Viudo
                        </label>
                        </div>                
                    </div>
                    </div>
                </fieldset>       
                </div>                              
            </div>

            
            <div class="row">
                <div class="modal-footer">
                    <input type="hidden" name="idPerson" id="idPerson">
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

    function calcularEdad(fecha_nacimiento) {
        var hoy = new Date();
        var cumpleanos = new Date(fecha_nacimiento);
        var edad = hoy.getFullYear() - cumpleanos.getFullYear();
        var m = hoy.getMonth() - cumpleanos.getMonth();
        if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
            edad--;
        }
        return edad;
    }


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
            var Nit = $('#Nit').val();
            var First_Name = $('#First_Name').val();
            var Second_Name = $('#Second_Name').val();
            var Telephone = $('#Telephone').val();
            var Gender = $('#Gender').val();
            var Nacionality = $('#Nacionality').val();
            var Marital_Status = $('.Marital_Status').val();
            var Birthday = $('#Birthday').val();            
            var RH = $('#RH').val();            
            var SurName = $('#SurName').val();
            var SecondSurname = $('#SecondSurname').val();
            var Email = $('#Email').val();

            var x = true;
           var edad = calcularEdad(Birthday);
            if(edad >= 18){
                alert("Eres mayor de edad :D ");                
            }else{
                alert("Eres menor de edad :( ");
                x = false;
            }

		    if(First_Name != '' && SurName != '' && Email != '' && x == true)
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
	        });



            //Funcionalida de editar
            $(document).on('click', '.editar', function(){		
            var idPerson = $(this).attr("idPerson");		
            $.ajax({
                url:"obtener_registro.php",
                method:"POST",
                data:{idPerson:idPerson},
                dataType:"json",
                success:function(data)
                    {

                        console.log(data);				
                        $('#modalUsuario').modal('show');
                        $('#Nit').val(data.Nit);
                        $('#First_Name').val(data.First_Name);
                        $('#Second_Name').val(data.Second_Name);
                        $('#SurName').val(data.SurName);
                        $('#SecondSurname').val(data.SecondSurname);
                        $('#Telephone').val(data.Telephone);                        
                        $('#Email').val(data.Email);
                        
                        if(data.Gender == 1)   {
                            $("#Gender1").prop("checked", true);
                        }else{
                            $("#Gender2").prop("checked", true);
                        }

                        if (data.Nacionality == 1){
                            $("#Nacionality1").prop("checked", true);
                        }else{
                            $("#Nacionality2").prop("checked", true);
                        }

                        if(data.Marital_Status == 1){
                            $('#Marital_Status1').prop("checked", true);
                        }else if(data.Marital_Status == 2){
                            $('#Marital_Status2').prop("checked", true);
                        }else if(data.Marital_Status == 3){
                            $('#Marital_Status3').prop("checked", true);
                        }else {
                            $('#Marital_Status4').prop("checked", true);
                        }
  
                       
                        $('#Birthday').val(data.Birthday);
                        $('#RH').val(data.RH);

                        $('.modal-title').text("Editar Usuario");
                        $('#idPerson').val(data.idPerson);                        
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
                var idPerson = $(this).attr("idPerson");
                if(confirm("Esta seguro de borrar este registro:" + idPerson))
                {
                    $.ajax({
                        url:"borrar.php",
                        method:"POST",
                        data:{idPerson:idPerson},
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

