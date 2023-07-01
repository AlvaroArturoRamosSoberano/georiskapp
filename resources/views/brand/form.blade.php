<head>

</head>

<div class="container">
    <div class="card">
        <h5 class="card-header">{{ $modo }} Linea</h5>
        <div class="card-body">
            <form>
                <fieldset>
                    <div class="form-group">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" value="{{ $brand->name }}"
                                id="name" placeholder="Linea">
                            <label for="name">Linea</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="logo_path">Logotipo</label>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $brand->logo_path }}"
                            alt="{{ $brand->name }}" width="100">
                        <input type="file" class="form-control" name="logo_path" value="{{ $brand->logo_path }}"
                            id="logo_path">
                    </div>
                </fieldset>

                <div class="w-100 d-flex justify-content-end">
                    <input class="btn btn-success btn-sm mt-2 me-2" type="submit" value="{{ $modo }} Linea">
                    <a class="btn btn-primary btn-sm mt-2" href="{{ url('brand/') }}">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
