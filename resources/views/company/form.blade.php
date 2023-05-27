<div class="container" id="vue">
    <form>
        <h1>{{ $modo }} Empresa</h1>

        <fieldset>
            {{-- <legend>Bar progress</legend> --}}
            <el-steps :space="200" :active="active" align-center finish-status="success" simple>
                <el-step v-for="step in stepper" style="cursor: pointer" @click="changeStepper(step.number)"
                    :title="step.title" :description="step.description">
                </el-step>
            </el-steps>
        </fieldset>

        <fieldset v-if="active === 1">
            {{-- <legend>Company information</legend> --}}
            <section class="form-section">
                <div class="form-group">
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" name="identifier_key"
                            value="{{ $company->identifier_key }}" id="identifier_key"
                            title="El identificador debe tener el formato XX/XXXXX/XXX/XX/XXXX"
                            placeholder="Identificador">
                        <label for="identifier_key">Identificador</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="description"
                            value="{{ $company->description }}" id="description" placeholder="Descripción">
                        <label for="description">Descripción</label>
                    </div>
                </div>

                <div class="form-group">
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $company->image_path }}"
                        alt="{{ $company->identifier_key }}" width="100">
                    <input type="file" class="form-control mb-2" name="image_path" value="" id="image_path">
                </div>
            </section>

            <section class="form-section">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="form-floating">
                                <select class="form-select" name="kind_company" id="kind_company"
                                    placeholder="Tipo de Empresa">
                                    <option value="">Seleccione un tipo de empresa</option>
                                    @foreach ($companies as $id => $kind)
                                        <option value="{{ $kind }}"
                                            {{ $company->kind_company == $kind ? 'selected' : '' }}>
                                            {{ $kind }}</option>
                                    @endforeach
                                </select>
                                <label for="kind_company">Tipo de Empresa</label>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <div class="form-floating ">
                                <select class="form-select" name="brand_id" id="brand_id" placeholder="Tipo de Linea">
                                    <option value="">Seleccione una línea</option>
                                    @foreach ($brands as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ $id == $company->brand_id ? 'selected' : '' }}>
                                            {{ $name }}</option>
                                    @endforeach
                                </select>
                                <label for="brand_id">Marca de la Empresa</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="geographic_detail_id"
                        value="{{ $company->geographic_detail_id }}" id="geographic_detail_id" hidden>
                </div>
        </fieldset>

        <fieldset v-if="active === 2">
            <legend>Information Geographic Details</legend>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <div class="form-floating mb-2">
                            <input type="number" step="any" class="form-control" name="latitude" id="latitude"
                                value="{{ $geographic_detail->latitude }}" placeholder="Latitude">
                            <label for="latitude">Latitud</label>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <div class="form-floating">
                            <input type="number" step="any" class="form-control" name="longitude" id="longitude"
                                value="{{ $geographic_detail->longitude }}" placeholder="Longitud">
                            <label for="longitude">Longitud</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="address" name="address"
                        value="{{ $geographic_detail->address }}" placeholder="Dirección">
                    <label for="address">Dirección</label>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="zip_code" id="zip_code"
                                value="{{ $geographic_detail->zip_code }}" placeholder="Codigo postal">
                            <label for="zip_code">Código Postal</label>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <div class="form-floating">
                            <select class="form-select" name="colony_id" id="colony_id" placeholder="Colonia">
                                <option value="">Seleccione una Colonia</option>
                                @foreach ($colonies as $id => $name)
                                    <option value="{{ $id }}"
                                        {{ $id == $geographic_detail->colony_id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="colony_id">Colonia</label>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <div class="form-floating">
                            <select class="form-select" name="township_id" id="township_id" placeholder="Municipio">
                                <option value="">Seleccione un Municipio</option>
                                @foreach ($townships as $id => $name)
                                    <option value="{{ $id }}"
                                        {{ $id == $geographic_detail->township_id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="township_id">Municipio</label>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <div class="form-floating">
                            <select class="form-select" name="state_id" id="state_id" placeholder="Estado">
                                <option value="">Seleccione un Estado</option>
                                @foreach ($states as $id => $name)
                                    <option value="{{ $id }}"
                                        {{ $id == $geographic_detail->state_id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="state_id">Estado</label>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>

        <div class="w-100 d-flex justify-content-end">
            <input class="btn btn-success btn-sm mt-2 me-2" type="submit" value="{{ $modo }} Empresa">
            <a class="btn btn-primary btn-sm mt-2 me-2" href="{{ url('company/') }}">Regresar</a>
            <el-button style="margin-top: 8px" @click="next">Siguiente paso</el-button>

        </div>
        </section>
    </form>
</div>

<script>
    // Obtener todos los campos de entrada en el formulario
    const inputs = document.querySelectorAll('input, select, textarea');

    // Agregar el evento keydown a cada campo de entrada
    inputs.forEach(input => {
        input.addEventListener('keydown', event => {
            // Si se presiona Enter
            if (event.keyCode === 13) {
                // Obtener el índice del campo actual
                const currentIndex = Array.from(inputs).indexOf(event.target);
                // Obtener el índice del siguiente campo
                const nextIndex = currentIndex + 1;
                // Si el siguiente campo existe, mover el foco a él
                if (inputs[nextIndex]) {
                    inputs[nextIndex].focus();
                    event.preventDefault();
                }
            }
        });
    });
</script>

<!-- Import style -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/element-plus@2.3.1/dist/index.min.css">
<!-- Import Vue 3 -->
<script src="https://cdn.jsdelivr.net/npm/vue@3.3.4/dist/vue.global.min.js"></script>
<!-- Import component library -->
<script src="https://cdn.jsdelivr.net/npm/element-plus@2.3.1/dist/index.full.min.js"></script>

<script>
    const {
        createApp,
        ref,
    } = Vue
    const App = {
        setup() {
            const message = ref("Stepper")
            const stepper = ref([{
                    title: "Datos Generales",
                    number: 1,
                    description: "Hola"
                },
                {
                    title: "Datos Geograficos",
                    number: 2,
                    description: "Hola2"
                },
                {
                    title: "Datos Regulatorios",
                    number: 3,
                    description: "Hola3"
                }

            ])
            const active = ref(1)
            const changeStepper = (number) => {
                active.value = number
            }
            const next = (number) => {
                if (active.value++ > number) active.value = 0
            }
            return {
                stepper,
                active,
                changeStepper,
                next,
            }
        }
    }
    const app = createApp(App)
    app.use(ElementPlus);
    app.mount('#vue')
</script>
