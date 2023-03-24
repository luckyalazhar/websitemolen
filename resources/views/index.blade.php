<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mobile Legends</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <h1 class="text-center mb-4">Mobile Legends</h1>
  <div class="container">
    <a href="/insert" type="button" class="btn btn-success mb-2">Tambah +</a>
    <div class="row g-3">
      <div class="col-auto">
        <form action="/" method="get">
          <input type="search" name="search" class="form-control" aria-describedby="passwordHelpInline">
        </form>
      </div>
    </div>
    <div class="row">
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Role</th>
            <th scope="col">Speciality</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        @foreach ($data as $index => $d)
          <tr>
            <th>{{ $index + $data->firstItem() }}</th>
            <td>{{ $d->name }}</td>
            <td>
              <img src="{{ asset('heroesimage/' . $d->image) }}" style="width:40px" alt="">
            </td>
            <td>{{ $d->role }}</td>
            <td>{{ $d->speciality }}</td>
            <td>
              <a href="/edit/{{ $d->id }}" class="btn btn-warning">Edit</a>
              <a href="#" class="btn btn-danger delete" data-id="{{ $d->id }}"
                data-name="{{ $d->name }}">Delete</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      {{ $data->links() }}
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
<script>
  $('.delete').click(function() {
    var heroesid = $(this).attr('data-id')
    var heroesname = $(this).attr('data-name')
    swal({
        title: "Are you sure?",
        text: "You will Delete this file with name " + heroesname + " !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/delete/" + heroesid + ""
          swal("Poof! Your file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your file is safe!");
        }
      });
  });
</script>
<script>
  @if (Session::has('success'))
    toastr.success('{{ Session::get('success') }}')
  @endif
</script>

</html>
