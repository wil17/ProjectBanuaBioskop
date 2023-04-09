@extends('layout.main')

@section('content')
<h3>Data Film</h3>
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('films/add') }}'">
            <i class="fas fa-plus-circle"></i>Tambah Data
        </button>
    </div>
    <div class="card-body">
        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil</strong> {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                {{ session('status') }}
            </div>
        @endif
        <form action="" method="GET">
            <div class="row mb-3">
              <label for="search" class="col-sm-2 col-form-label">Cari Data</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control form-control-sm" value="" placeholder="Ketikkan data yang ingin dicari..." name="search" autofocus value="{{ $search }}">
              </div>
              </div>
          </form>
      <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Film</th>
                <th>Image</th>
                <th>Nama Film</th>
                <th>Durasi</th>
                <th>Genre</th>
                <th>Sutradara</th>
                <th>Sinopsis</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @php
              $nomor = 1 + (($films->currentPage() - 1) * $films->perPage());
            @endphp
            @foreach ($films as $row)
            <tr>
                {{-- <th>{{ $loop->iteration }}</th> --}}
                <td>{{ $nomor++ }}</td>
                <td>{{ $row->idfilms }}</td>
                <td>
                    <div>
                      <img style="width: 200px" src="{{ asset('storage/'. $row->image)}}">
                    </div>
                  </td>
                <td>{{ $row->namafilm }}</td>
                <td>{{ $row->durasi }}</td>
                <td>{{ $row->genre }}</td>
                <td>{{ $row->sutradara }}</td>
                <td>{{ $row->sinopsis }}</td>
                <td>
                    <button onclick="window.location='{{ url('films/'.$row->idfilms) }}'" type="button" class="btn btn-sm btn-info" title="Edit Data">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form onsubmit="return deleteData('{{ $row->namafilm }}')" style="display: inline" method="POST"action="{{ url('films/'.$row->idfilms) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
      {{-- {{ $films->links() }} --}}
      {!! $films->appends(Request::except('page'))->render() !!}
    </div>
  </div>
    <script>
    function deleteData(name){
    pesan = confirm('Yakin menghapus data film dengan judul ${name} ini dihapus ?');
    if(pesan) return true;
    else return false;
    }
    </script>
@endsection