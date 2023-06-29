<head>

</head>


<div class="container">

    <div class="card">
        <h5 class="card-header">{{ $modo }} Tipo Compañia</h5>
        <div class="card-body">
            <form>
                <fieldset>
                    <section class="form-section">
                        <div class="form-group m-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" value="{{ $company->name }}"
                                    id="name" placeholder="Nombre">
                                <label for="name">Nombre</label>
                            </div>
                        </div>
                    </section>
                </fieldset>

                <div class="w-100 d-flex justify-content-end">
                    <input class="btn btn-success btn-sm mt-2 me-2" type="submit" value="{{ $modo }} Tipo empresa">
                    <a class="btn btn-primary btn-sm mt-2 me-2" href="{{ url('companyType/') }}">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
