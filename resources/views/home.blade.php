<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ url('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <h1 class="text-center mt-2 mb-4">Data Mahasiswa</h1>
  <div class="container">
    <a href="/input" type="button" class="btn btn-success mb-2">Tambah Data</a>
    <div class="row g-3 align-items-center mt-2">
      <div class="col-auto">
        <form action="/" method="GET">
          <input type="search" name="search" id="inputPassword6" class="form-control"
            aria-describedby="passwordHelpInline">
        </form>
      </div>
      <div class="col-auto">
        <a href="/exportpdf" type="button" class="btn btn-primary ">Export Pdf</a>
      </div>
    </div>
    <div class="row mt-1">
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Foto</th>
            <th scope="col">NIM</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">No. HP</th>
            <th scope="col">Dibuat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($data as $index => $d)
            <tr>
              <th scope="row">{{ $index + $data->firstItem() }}</th>
              <td>{{ $d->nama }}</td>
              <td>
                <img src="{{ asset('foto/' . $d->foto) }}" alt="" style="width: 40px">
              </td>
              <td>{{ $d->nim }}</td>
              <td>{{ $d->jeniskelamin }}</td>
              <td>0{{ $d->notelpon }}</td>
              <td>{{ $d->created_at->format('d M Y') }}</td>
              <td>
                <a href="/show/{{ $d->id }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="#" class="btn btn-sm btn-danger delete" data-id="{{ $d->id }}"
                  data-name="{{ $d->nama }}">Delete</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $data->links() }}
    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<script>
  $('.delete').click(function() {
    var studentid = $(this).attr('data-id');
    var nama = $(this).attr('data-name');
    swal({
        title: "Yakin ?",
        text: "Kamu akan menghapus data student dengan nama " + nama + "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/delete/" + studentid + ""
          swal("Data berhasil di hapus", {
            icon: "success",
          });
        } else {
          swal("Data tidak jadi di hapus !");
        }
      });
  });
</script>

<script>
  @if (session()->has('success'))
    toastr.success("{{ session('success') }}")
  @endif
</script>

</html>
