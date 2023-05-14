<div class="container">
    <h1>{{ $modo }} Linea</h1>
    <div class="form-group">
        <label for="name">Linea</label>
        <input type="text" class='form-control' name="name" value="{{ $brand->name }}" id="name">
    </div>

    <div class="form-group">
        <label for="logo_path">Logotipo</label>
        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $brand->logo_path }}" alt="{{ $brand->name }}" width="100">
        <input type="file" class='form-control' name="logo_path" value="{{ $brand->logo_path }}" id="logo_path">
    </div>

    <div class="w-100 d-flex justify-content-end">
        <input class="btn bg-success btn-sm mt-2 me-2" type="submit" value="{{ $modo }} Linea">
        <a class="btn bg-primary btn-sm mt-2" href="{{ url('brand/') }}">Regresar</a>
    </div>
</div>