<head>

</head>

<div class="container">
    <div class="card">
        <h5 class="card-header">{{ $modo }} Riesgo</h5>
        <div class="card-body">
            <form>
                <fieldset>
                    <div class="form-group">
                        <div class="form-floating">
                            <select class="form-select" name="company_id" id="company_id" placeholder="Compañia">
                                <option value="">Seleccione una empresa</option>
                                @foreach ($company as $id => $identifier_key)
                                    <option value="{{ $id }}"
                                        {{ $id == $companyRiskAspect->company_id ? 'selected' : '' }}>
                                        {{ $identifier_key }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="company_id">Compañia</label>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
