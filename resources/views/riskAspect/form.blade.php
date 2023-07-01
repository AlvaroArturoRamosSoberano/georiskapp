<head>

</head>

<div class="container">
    <div class="card">
        <h5 class="card-header">{{ $modo }} Aspecto de Riesgo</h5>
        <div class="card-body">
            <form>
                <fieldset>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating m-2">
                                <input type="text" class="form-control" name="name" value="{{ $riskAspect->name }}"
                                    id="name" placeholder="Aspecto de Riesgo">
                                <label for="name">Aspecto de Riesgo</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-floating m-2">
                                <input type="text" class="form-control" name="type"
                                    value="{{ $riskAspect->type }}" id="type" placeholder="Tipo">
                                <label for="type">Tipo</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="w-100 d-flex justify-content-end">
                    <input class="btn btn-success btn-sm m-2" type="submit"
                        value="{{ $modo }} Aspecto de riesgo">
                    <a class="btn btn-primary btn-sm m-2" href="{{ url('riskAspect/') }}">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
