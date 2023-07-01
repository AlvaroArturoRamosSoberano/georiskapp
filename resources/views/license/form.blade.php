<head>

</head>

<div class="container">
    <div class="card">
        <h5 class="card-header">{{ $modo }} Licencia</h5>
        <div class="card-body">
            <form>
                <fieldset>
                    <div class="form-group">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" value="{{ $license->name }}"
                                id="name" placeholder="Licencia">
                            <label for="name">Licencia</label>
                        </div>
                    </div>
                </fieldset>

                <div class="w-100 d-flex justify-content-end">
                    <input class="btn btn-success btn-sm mt-2 me-2" type="submit" value="{{ $modo }} Licencia">
                    <a class="btn btn-primary btn-sm mt-2" href="{{ url('license/') }}">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
