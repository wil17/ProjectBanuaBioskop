@extends('layout.main')

@section('content')
<h3>Tambah Data Film</h3>
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('films') }}'">
            </i>Kembali
        </button>
    </div>
    <div class="card-body">
        <form action="{{ url('films') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="idfilms" class="col-sm-2 col-form-label">Id Film</label>
                <div class="col-sm-4">
                  <input type="number" class="form-control form-control-sm @error('idfilms') is-invalid @enderror" id="idfilms" name="idfilms" value="{{ old('idfilms') }}">
                  @error('idfilms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="input-group mb-3">
                <label class="input-group-text" for="image">Upload</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                @error('image')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>                            
                  @enderror
              </div>
              <div class="row mb-3">
                <label for="namafilm" class="col-sm-2 col-form-label">Nama Film</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-sm @error('namafilm') is-invalid @enderror" id="namafilm" name="namafilm" value="{{ old('namafilm') }}">
                  @error('namafilm')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="durasi" class="col-sm-2 col-form-label">Durasi</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-sm @error('durasi') is-invalid @enderror" id="durasi" name="durasi" value="{{ old('durasi') }}">
                  @error('durasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="genre" class="col-sm-2 col-form-label @error('genre') is-invalid @enderror">Genre</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-sm" id="genre" name="genre" value="{{ old('genre') }}">
                  @error('genre')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="sutradara" class="col-sm-2 col-form-label @error('sutradara') is-invalid @enderror">Sutradara</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-sm" id="sutradara" name="sutradara" value="{{ old('sutradara') }}">
                  @error('sutradara')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="sinopsis" class="col-sm-2 col-form-label @error('sinopsis') is-invalid @enderror">Sinopsis</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="sinopsis" id="sinopsis" cols="30" rows="10" value="{{ old('sinopsis') }}"></textarea>
                  @error('sinopsis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
  function previewImage(){
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview');
  
  imgPreview.style.display = 'block';

  const ofReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent) {
    imgPreview.src = oFREvent.target.result;
  }
}
  </script>
@endsection