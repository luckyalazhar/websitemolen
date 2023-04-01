@extends('layout.dashboard')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@endpush
@section('content')

<body>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Data Hero</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Hero</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card text-bg-dark">
            <div class="card-body">
              <form action="/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nama</label>
                  <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $data->name }}">
                </div>
                <div class="mb-3">
                  <label for="role" class="form-label">Role</label>
                  <select name="role" class="form-select" aria-label="Default select example">
                    <option selected>{{ $data->role }}</option>
                    <option value="assassin">Assassin</option>
                    <option value="fighter">Fighter</option>
                    <option value="mage">Mage</option>
                    <option value="marksman">Marksman</option>
                    <option value="support">Support</option>
                    <option value="tank">Tank</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="speciality" class="form-label">Speciality</label>
                  <input name="speciality" type="text" class="form-control" id="speciality" aria-describedby="emailHelp" value="{{ $data->speciality }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
@endsection
