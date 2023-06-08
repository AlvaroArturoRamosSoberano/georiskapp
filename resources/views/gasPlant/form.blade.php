<div class="container">
    <div class="card">
        <h5 class="card-header">Aspectos Regulatorios Gasolineras</h5>
        <div class="card-body">
            <form>
                <fieldset>
                    {{-- <legend>Gasolineras</legend> --}}
                    <section class="form-section">
                        <div class="form-group m-2">
                            <div class="form-floating">
                                <select class="form-select" name="company_id" id="company_id" placeholder="Compañia">
                                    <option value="">Seleccione una Empresa</option>
                                    @foreach ($companies as $id => $identifier_key)
                                        <option value="{{ $id }}"
                                            {{ $companies->contains($id) ? 'selected' : '' }}>{{ $identifier_key }}
                                        </option>
                                        {{ $identifier_key }}</option>
                                    @endforeach
                                </select>
                                <label for="company_id">Empresa</label>
                            </div>
                            {{-- <div class="form-floating mb-2">
                                <input type="text" class="form-control" name="company_id" value="" id="company_id"
                                    placeholder="Compañia">
                                <label for="company_id">Compañia</label>
                            </div> --}}
                        </div>

                        <div class="form-group m-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="regulatory_aspect_id" value=""
                                    id="regulatory_aspect_id" placeholder="Aspecto regulatorio">
                                <label for="regulatory_aspect_id">Aspecto Regulatorio</label>
                            </div>
                        </div>
                    </section>
                </fieldset>

                <fieldset>
                    {{-- <legend>Aspectos regulatorios</legend> --}}
                    <section class="form-section ">
                        <div class="row">
                            <div class="col">
                                <div class="form-check m-2">
                                    <input class="form-check-input" type="checkbox" name="conservation_program"
                                        value="" id="conservation_program" placeholder="Programa de Conservación">
                                    <label class="form-check-label" for="conservation_program">Programa de
                                        conservación:</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check m-2">
                                    <input class="form-check-input" type="checkbox" name="gas_production" value=""
                                        id="gas_production" placeholder="Producción de Gases">
                                    <label class="form-check-label" for="gas_production">Producción de Gases:</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check m-2">
                                    <input class="form-check-input" type="checkbox" name="emergency_plan" value=""
                                        id="emergency_plan" placeholder="Plan de Emergencia">
                                    <label class="form-check-label" for="emergency_plan">Plan de Emergencia:</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="license_id" value=""
                                    id="license_id" placeholder="Licencias">
                                <label for="license_id">Licencias</label>
                            </div>
                        </div>
                    </section>
                </fieldset>

                <fieldset>
                    <section class="form-section">

                    </section>
                </fieldset>
                <section class="w-100 d-flex justify-content-end">
                    <input class="btn btn-success btn-sm  me-2 " type="submit">
                    <a class="btn btn-primary btn-sm  me-2 " href="{{ url('gasPlant/') }}">Regresar</a>
                </section>
            </form>
        </div>
    </div>
</div>
