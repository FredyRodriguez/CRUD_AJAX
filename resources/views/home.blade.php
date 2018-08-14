@extends('layouts.app')

@section('content')
<div class="container">
    <div >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Panel de Control</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- <div>
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus"></i>
                            <b>Crear Usuarios</b>
                        </a>
                    </div><br>--}}
                    <p>
                        <span id="user_total">{{$users->total()}}</span> resgistros | pagina {{$users->currentPage()}} de {{$users->lastPage()}}
                    </p>
                    <div id="alert" class="alert alert-info"></div>
                     <div class="table-responsive-md">
                        <table id="data" class="table table-striped">
                            <thead>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Documento</th>
                                <th class="text-center">Telefono</th>
                                <th class="text-center">Dirección</th>
                                <th class="text-center">Genero</th>
                                <th class="text-center">Fecha Nacimiento</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Eliminar</th>
                                
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr  class="text-center">
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->documento}}</td>
                                    <td>{{$user->telefono}}</td>
                                    <td>{{$user->direccion}}</td>
                                    <td>{{$user->genero}}</td>
                                    <td>{{$user->fecha}}</td>                            
                                    <td>{{$user->email}}</td>
                                    <td>
                                    
                                    </td>
                                    <td>{!!Form::open(['route' => ['destroy', $user->id], 'method' => 'DELETE'])!!}
                                            <a href="" class="btn btn-danger">Eliminar</a>
                                        {!!Form::close()!!}
                                    </td>
                                @endforeach
                            </tbody> 
                        </table>     
                        {{ $users->links() }}   
                        </div>          
                </div>
            </div>
        </div>
    </div>
    {{--Inicio Modal--}}
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Usuarios</h5>
      </div>
      <div class="modal-body">        
        <form action="{{url('home')}}" class="form-group" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class=row>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="">Nombre</label>
                    <input type="text" name="name" class="form-control" placeholder="Nombre" autocomplete="off">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="">Cedula</label>
                    <input type="number" name="documento" class="form-control" placeholder="Cedula" autocomplete="off">
                </div>
            </div>
            <div class=row>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="">Telefono</label>
                    <input type="number" name="telefono" class="form-control" placeholder="Telefono" autocomplete="off">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="">Direccion</label>
                    <input type="text" name="direccion" class="form-control" placeholder="Direccion" autocomplete="off">
                </div>
            </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group form-md-line-input">
                            <label for="">Genero</label>
                            <select name="genero" id="genero" class="form-control">
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group form-md-line-input">
                            <label for="">Fecha Nacimiento</label>
                            <input type="date" name="fecha" class="form-control"/>            
                        </div>
                    </div>
                </div>
                <div class="form-group form-md-line-input">
                    <label for="">Correo</label>
                    <input type="email" name="email" class="form-control" placeholder="Email"/>            
                </div>
                 <div class="form-group form-md-line-input">
                    <label for="">Contraseña</label>
                    <input type="password" name="password" class="form-control" placeholder="Contraseña"/>            
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="insert">Guardar</button>
            </div>
        </form>
      </div>      
    </div>
  </div>
</div>
    {{--Fin Modal--}}
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{--<script type="text/javascript">
    $('#insert').click(function(){
        $.ajax({
            type:'post',
            url:'home',
            data:{
                '_token':$('input[name = _token]').val(),
                'name':$('input[name = name]').val(),
                'documento':$('input[name = documento]').val(),
                'telefono':$('input[name = telefono]').val(),
                'direccion':$('input[name = direccion]').val(),
                'genero':$('input[name = genero]').val(),
                'fecha':$('input[name = fecha]').val(),
                'email':$('input[name = email]').val(),
                'password':$('input[name = password]').val(),
            },
            success:function(data){
                window.location.reload();
            },
        });
    });
</script>--}}
@section('script')
    <script src="{{asset('js/delete.js')}}"></script>
@endsection

