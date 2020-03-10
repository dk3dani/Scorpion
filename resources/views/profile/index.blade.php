@extends('layouts.master')

@section('content')

 <card titulo="Editar perfil">

    {{-- <form action="{{route('user.update')}}" method="POST">
        {!! csrf_field () !!}
<div class="form-group">
<label for="name"> nome</label>
<input type="text" name="name"  value="{{auth()->user()->name}}" placeholder="nome" class="form-control">
</div>
<div class="form-group">
<label for="email"> Email</label>
<input type="email" name="email"value="{{auth()->user()->email}}"placeholder="email" class="form-control">
</div>
<button type="submit" class="btn btn-success">Submit</button>
    </form>

</card> --}}
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="https://cdn.pixabay.com/photo/2017/07/18/23/23/user-2517433_960_720.png" alt="User profile picture">
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
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active bg-secondary" href="#settings" data-toggle="tab">Editar Perfil</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">

                <div class="tab-pane active" id="settings">
                <form class="form-horizontal" action="{{route('user.update')}}" method="POST">
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
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Submit</button>
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
