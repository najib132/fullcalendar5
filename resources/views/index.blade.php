@extends('layouts.template')
@section('content')
 
 </style>

    <div class="card mp-3 mt-5 ">
        <div class="card-header search-header">
            <h5 class="card-title">Filtrer Utilisateur</h5>
        </div>
        <div class="card-body">
            <form >

                <label class="form-label col-4">Liste des Utilisateur</label>
                <select class="select2  form-control col-6" name="user_name">
                    <option value="">Tous les Utilisateur</option>
                        @foreach($users as $user)
                        <option value="MARZOUK">{{ Str::upper($user->name) }} </option> 
                        @endforeach
                </select>
                <div class="form-group mt-3">
                    <div class="row text-center">
                        <div class="col-6">
                            <a href="#" class="btn btn-dlt">
                                <i class="fas fa-undo-alt"></i>
                                tous les utilisateurs
                            </a>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>


    <div class=" mb-4 mt-3 text-center">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-add col-2" data-toggle="modal" data-target="#exampleModal" style="color: white">
            <i class="fas fa-plus"></i>
            Ajouter Notification
        </button>
    </div>
    <!-----------------add event-------------------------------------------------->

    <div class="modal fade  mb-3" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-add" style="background-color: #e1b058 ; color: white !important;">
                    <h5 class="modal-title " id="exampleModalLabel">Nouvelle Notificaton </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                	
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Titre de la tâche</label>
                                    <input type="text" class="form-control" id="titre" name="name" required >
                                    <span id="titleError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date de la tâche</label>
                                    <input type="datetime-local" class="form-control" name="datee" id="date" required>
                                    <span id="dateError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Commentaire</label>
                                    <textArea class="form-control" name="comment" id="comment" row="5" required> </textArea>
                                    <span id="commentError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  class="btn btn-success" id="add-event"><i class="fas fa-save"></i> Enregistrer </button>
                    </div>
            </div>
        </div>
    </div>
    <!----------------update event---------------------------->

    <div class="modal fade  mb-3 edit" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-add" style="background-color: #FFA500 ; color: white !important;">
                    <h5 class="modal-title " id="exampleModalLabel">Edit Notificaton </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Titre de la tâche</label>
                                    <input type="text" class="form-control" id="titreedit" name="name" required >
                                    <span id="titleeditError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date de la tâche</label>
                                    <input type="datetime-local" class="form-control" name="datee" id="dateedit" required>
                                    <span id="dateeditError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Commentaire</label>
                                    <textArea class="form-control" name="comment" id="commentedit" row="5"> </textArea>
                                    <span id="commenteditError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  class="btn btn-danger" id="delete-event"><i class="fas fa-trash"></i> Delete </button>
                        <button  class="btn btn-success" id="edit-event"><i class="fas fa-save"></i> Update </button>
                    </div>
                    
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------->

    <div class="card mb-4 mt-3 p-2">
        <div id='calendar'></div>
    </div>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Les tâches validées </button>
   


    
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header search-header">
                    <h5 class="card-title">Liste des Notification</h5>
                </div>
                <div class="card-body">
                <form id="myform">
                    <div class="col-md-12 text-center">
                        <div class="col-md-6">
                            <select class="form-control" id="status">
                              <option selected disabled>Select status</option>
                              <option value="En attente">En attente</option>
                              <option value="Rejetée">Rejetée</option>
                              <option value="Valide">Valide</option>
                            </select>
                        </div>
                        <br>
                    </div>
                </form>
                    

                    <div class="table-responsive">
                        <table id="table1" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th scope="col"><input type="checkbox" id="check_all" value="0"></th>
                                <th scope="col">id</th>
                                <th scope="col">date</th>
                                <th scope="col">Titre du tâche</th>
                                <th scope="col">commentaire</th>
                                    <th scope="col">User</th>
                                <th scope="col">etat</th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($eventss as $event)
                                <tr id="{{$event['id']}}">
                                    <td><input type="checkbox" class="checkbox" name="customer_id[]" value="{{$event['id']}}" /></td>
                                    <td id="id">{{ $event->id }}</td>
                                    <td>{{ $event->datee }}</td>
                                    <td>{{ $event->name }}</td>
                                    <td>
                                        {{ $event->comment }}
                                            <a href="#" target='_blank' class=""> <i class="fas fa-eye"></i>
                                            </a>
                                    </td>
                                        <th scope="col">{{ Str::upper( $event->user->name) }}</th>
                                    <td>
                                        <span class="@if($event->status == 'Valide') badge badge-success @elseif($event->status == 'En attente') badge badge-warning @elseif($event->status =='Rejetée' ) badge badge-danger @endif">{{ $event->status }}</span>
                                        
                                    </td>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"> Les tâches validées</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table id="" class="table table-striped table-bordered table1" style="width:100%">
                                <thead>
                                   
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">date</th>
                                    <th scope="col">nom</th>
                                    <th scope="col">comment</th>
                                    <th scope="col">User</th>
                                    <th scope="col">etat</th>
                                </tr>

                                </thead>
                                <tbody>
                                    @foreach($eventsss as $event) 
                                        <tr>
                                            <td>{{ $event->id }}</td>
                                            <td>{{ $event->datee }}</td>
                                            <td>{{ $event->name }}</td>
                                            <td>{{ $event->comment }}</td>
                                                <th scope="col">{{ $event->user->name }}</th>
                                            <td>

                                                <span class="@if($event->status == 'Valide') badge badge-success @elseif($event->status == 'En attente') badge badge-warning @elseif($event->status =='Rejetée' ) badge badge-danger @endif">{{ $event->status }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                     </div>
                </div>
    
    
            </div>
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#check_all').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".checkbox").prop('checked', true);  
         } else {  
            $(".checkbox").prop('checked',false);  
         }  
        });
         $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#check_all').prop('checked',true);
            }else{
                $('#check_all').prop('checked',false);
            }
         });

         $(document).on('change', '#status', function() {
            var id = [];
            let status = $('#status').val();
            $(':checkbox:checked').each(function(i){
                id[i] = $(this).val();
            });
            if(id.length === 0 ){
                alert("Please Select atleast one checkbox" + status);
            }else{

              let status = $('#status').val();
              let status1 = $('#status').children("option:selected"). text();
              if(confirm('Are you sure want to update it')){

              $.ajax({
                 url:"{{ url('/affectation') }}" ,
                 type:'POST',
                 data:{
                    ids:id,
                    status:status1,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data, status, xhr){
                    location.reload();  
                  let status1 = $('#status').children("option:selected"). text();
                  if(status1=="En attente"){
                  status1=`<span class="badge badge-warning">En attente</span>`;
                  }else if(status1=="Valide"){
                  status1 = `<span class="badge badge-success">Valide</span>`;
                  }else {
                  status1 = `<span class="badge badge-danger">Rejetée</span>`;
                  }

                  for(var i=0; i<id.length; i++)
                  {
                    $('tr#'+id[i]).find('td:last-child').html(status1);
                  }
                },
                error: function(xhr, status, msg) {
                  return console.error(xhr, status, msg)
                }
              });
            }
           }
          });     
    });
</script>

    <script>
       
        $(document).ready(function () {

            $('#table1').DataTable({
	              dom: 'Bfrtip',
              	  buttons: [
                	    'excel'
          	      ]
           	     ,
                "oLanguage": {
                    "sEmptyTable": "Aucune donnée disponible dans le tableau",
                    "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                    "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
                    "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ",",
                    "sLengthMenu": "Afficher _MENU_ éléments",
                    "sLoadingRecords": "Chargement...",
                    "sProcessing": "Traitement...",
                    "sSearch": "Rechercher :",
                    "sZeroRecords": "Aucun élément correspondant trouvé",
                    "oPaginate": {
                        "sFirst": "Premier",
                        "sLast": "Dernier",
                        "sNext": "Suivant",
                        "sPrevious": "Précédent"
                    },
                    "oAria": {
                        "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                    },
                    "select": {
                        "rows": {
                            "_": "%d lignes sélectionnées",
                            "0": "Aucune ligne sélectionnée",
                            "1": "1 ligne sélectionnée"
                        }
                    }
                }


            });
        });

        var events = @json($events);
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {

          locale: 'fr',
          eventDisplay: 'block',
          initialView: 'dayGridMonth',
          eventColor: 'orange',
          events: events,
          headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
          editable: false,

                eventClick: function(event){
                    id = event.event.id;
                    $.ajax({
                            type:"GET",
                            url:"{{ url('/edit') }}" +'/'+ id,
                            dataType:'json',
                            success:function(response)
                            {
                                 $('#editModal').modal('toggle');
                                 $('#titreedit').val(response.name);
                                 $('#dateedit').val(response.datee);
                                 $('#commentedit').val(response.comment); 
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                $('#edit-event').on("click", function(){
                    id = event.event.id;

                    titreedit   = $('#titreedit').val();
                    dateedit    =  $('#dateedit').val();
                    commentedit = $('#commentedit').val();
                    $.ajax({
                        url:"{{ url('/update') }}" + "/" + id,
                        type:"POST",
                        dataType:'json',
                        data:{ titreedit, dateedit, commentedit, "_token": "{{ csrf_token() }}"   },
                        success:function(response)
                        {
                            $('#editModal').modal('hide');
                             //event.event.setProp("title", $('#titre').val());  
                             location.reload();
                            
                        },
                        error:function(error)
                        {
                          if(error.responseJSON.errors) {
                            $('#titleeditError').html(error.responseJSON.errors.titreedit);
                            $('#dateeditError').html(error.responseJSON.errors.dateedit);
                            $('#commenteditError').html(error.responseJSON.errors.commentedit);
                          }
                            console.log(error)
                        },
                    }); 
                    //$('#editModal').modal('hide'); 
                });
                  $('#delete-event').on("click", function(){ 
                    var id = event.event.id;
                        if(confirm('Are you sure want to remove it')){
                            $.ajax({
                                url:"{{ url('/delete') }}" +'/'+ id,
                                type:"DELETE",
                                dataType:'json',
                                data:{id:id,"_token": "{{ csrf_token() }}"},
                                success:function(response)
                                {
                                    $('#editModal').modal('hide');
                                    event.event.remove();
                                },
                                error:function(error)
                                {
                                    console.log(error)
                                },
                            });
                        }
                    });
                },
          
        });
        $('#add-event').on("click", function(){
            var titre = $('#titre').val();
            var datee = $('#date').val();
            var comment = $('#comment').val();
            
            $.ajax({
                url:"{{ url('/events') }}",
                type:"POST",
                dataType:'json',
                data:{ titre, datee, comment, "_token": "{{ csrf_token() }}"  },
                success:function(response){
                    $('#exampleModal').modal('hide');
                    console.log(response);
                     calendar.addEvent({
                         title: titre,
                         start: datee, 
                    });
                    location.reload();    
                },
                error:function(error){
                    if(error.responseJSON.errors) {
                        $('#titleError').html(error.responseJSON.errors.titre);
                        $('#dateError').html(error.responseJSON.errors.datee);
                        $('#commentError').html(error.responseJSON.errors.comment);
                    }
                },
            });
        });

        

        calendar.render();  
      });
    </script>



@endsection