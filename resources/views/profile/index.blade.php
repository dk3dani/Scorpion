@extends('layouts.master')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid  img-circle"  src="{{ url('storage/users/'.auth()->user()->image)}}" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

              <p class="text-muted text-center">Admin</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right">{{auth()->user()->email}}</a>
                </li>
                <li class="list-group-item">
                    <b>Descrição</b> <a class="float-right">....</a>
                  </li>

              </ul>


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header  bg-purple  p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><h1> <span class="badge bg-purple"><i class="fas fa-user-edit"></i> Editar Perfil</span></h1></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">

                <div class="tab-pane active" id="settings">
                <form class="form-horizontal" action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
                    {!! csrf_field () !!}
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="name"  value="{{auth()->user()->name}}"  class="form-control" id="name" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email"  name="email" value="{{auth()->user()->email}}"  class="form-control" id="inputEmail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password"   class="col-sm-2 col-form-label">Senha</label>
                      <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Nova senha">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="image"   class="col-sm-2 col-form-label">Imagem de Perfil</label>
                      <div class="col-sm-10">
                        <input type="file" name="image" class="form-control" id="image" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Atualizar</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>


@endsection
