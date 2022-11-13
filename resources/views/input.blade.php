<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>

<body>
  <h1 class="text-center mt-2 mb-4">Tambah Data Mahasiswa</h1>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card text-bg-dark">
          <div class="card-body">
            <form action="/input" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama">
              </div>
              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" id="nim">
              </div>
              <div class="mb-3">
                <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                  <option selected>Pilih Jenis Kelamin</option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="notelpon" class="form-label">No. HP</label>
                <input type="number" name="notelpon" class="form-control" id="notelpon">
              </div>
              <div class="mb-3">
                <label for="foto" class="form-label">Masukkan Foto</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input type="file" name="foto" class="form-control" id="foto" onchange="PreviewImage()">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>
