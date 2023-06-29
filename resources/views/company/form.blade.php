<head>

</head>

<div class="container" id="vue">

    <div class="card">
        <h5 class="card-header">{{ $modo }} Empresa</h5>
        <div class="card-body">
            <form>
                <fieldset>
                    {{-- <legend>Bar progress</legend> --}}
                    {{-- <el-steps :space="200" :active="active" align-center finish-status="success" simple>
                        <el-step v-for="step in stepper" style="cursor: pointer" @click="changeStepper(step.number)"
                            :title="step.title" :description="step.description">
                        </el-step>
                    </el-steps> --}}
                </fieldset>

                <fieldset {{-- v-if="active === 1" --}}>
                    {{-- <legend>Company information</legend> --}}
                    <section class="form-section">
                        <div class="form-group m-2">
                            <div class="form-floating">
                                <input v-model="formData.identifier_key" type="text" class="form-control"
                                    name="identifier_key" value="{{ $company->identifier_key }}" id="identifier_key"
                                    title="El identificador debe tener el formato XX/XXXXX/XXX/XX/XXXX"
                                    placeholder="Identificador">
                                <label for="identifier_key">Identificador</label>
                            </div>
                        </div>

                        <div class="form-group m-2">
                            <div class="form-floating">
                                <input v-model="formData.description" type="text" class="form-control "
                                    name="description" value="{{ $company->description }}" id="description"
                                    placeholder="Descripción">
                                <label for="description">Descripción</label>
                            </div>
                        </div>

                        <div class="form-group me-3">
                            <img class="img-thumbnail img-fluid"
                                src="{{ asset('storage') . '/' . $company->image_path }}"
                                alt="{{ $company->identifier_key }}" width="100">
                            <input v-model="formData.image_path" type="file" class="form-control m-2"
                                name="image_path" value="" id="image_path">
                        </div>
                    </section>

                    <section class="form-section m-2">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="form-floating">
                                        <select v-model="formData.company_type_id" class="form-select"
                                            name="company_type_id" id="company_type_id" placeholder="Tipo de Empresa">
                                            <option value="">Seleccione un tipo de empresa</option>
                                            @foreach ($companies as $id => $name)
                                                <option value="{{ $id }}"
                                                    {{ $id == $company->company_type_id ? 'selected' : '' }}>
                                                    {{ $name }}
                                                </option>
                                            @endforeach
                                            <option value="other">Otro</option>
                                        </select>
                                        <label for="company_type_id">Tipo de Empresa</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <div class="form-floating">
                                        <select v-model="formData.brand_id" class="form-select" name="brand_id"
                                            id="brand_id" placeholder="Tipo de Linea">
                                            <option value="">Seleccione una línea</option>
                                            @foreach ($brands as $id => $name)
                                                <option value="{{ $id }}"
                                                    {{ $id == $company->brand_id ? 'selected' : '' }}>
                                                    {{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="brand_id">Marca de la Empresa</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-2">
                            <input v-model="formData.geographic_detail_id" type="text" class="form-control"
                                name="geographic_detail_id" value="{{ $company->geographic_detail_id }}"
                                id="geographic_detail_id" hidden>
                        </div>
                    </section>
                </fieldset>
                <div class="animate__slideInRight">
                    <fieldset {{-- v-if="active === 2" --}}>
                        {{-- <legend>Information Geographic Details</legend> --}}
                        <section class="form-section m-2">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <input v-model="formData.latitude"type="number" step="any"
                                                class="form-control" name="latitude" id="latitude"
                                                value="{{ $geographic_detail->latitude }}" placeholder="Latitude">
                                            <label for="latitude">Latitud</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <input v-model="formData.longitude" type="number" step="any"
                                                class="form-control" name="longitude" id="longitude"
                                                value="{{ $geographic_detail->longitude }}" placeholder="Longitud">
                                            <label for="longitude">Longitud</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="form-group m-2">
                            <div class="form-floating">
                                <input v-model="formData.address" type="text" class="form-control" id="address"
                                    name="address" value="{{ $geographic_detail->address }}"
                                    placeholder="Dirección">
                                <label for="address">Dirección</label>
                            </div>
                        </div>
                        <section class="form-section m-2">
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <input v-model="formData.zip_code" type="text" class="form-control"
                                                name="zip_code" id="zip_code"
                                                value="{{ $geographic_detail->zip_code }}"
                                                placeholder="Codigo postal">
                                            <label for="zip_code">Código Postal</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <select v-model="formData.colony_id" class="form-select" name="colony_id"
                                                id="colony_id" placeholder="Colonia">
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
                                            <select v-model="formData.township_id" class="form-select"
                                                name="township_id" id="township_id" placeholder="Municipio">
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
                                            <select v-model="formData.state_id" class="form-select" name="state_id"
                                                id="state_id" placeholder="Estado">
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
                        </section>
                    </fieldset>
                </div>


                <div class="w-100 d-flex justify-content-end">
                    <input class="btn btn-success btn-sm m-2" type="submit" value="{{ $modo }} Empresa">
                    <a class="btn btn-primary btn-sm m-2" href="{{ url('company/') }}">Regresar</a>
                    <el-button style="margin-top: 8px" @click="next">Siguiente paso</el-button>
                </div>
                </section>
            </form>
        </div>
    </div>
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
                    description: "Datos Generales de la empresa"
                },
                {
                    title: "Datos Geograficos",
                    number: 2,
                    description: "Datos Geograficos de la empresa"
                },
                {
                    title: "Datos Regulatorios",
                    number: 3,
                    description: "Datos Regulatorios de la empresa"
                }

            ])
            const formData = ref({
                identifier_key: '',
                description: '',
                image_path: '',
                company_type_id: '',
                brand_id: '',
                geographic_detail_id: '',
                latitude: '',
                longitude: '',
                address: '',
                zip_code: '',
                colony_id: '',
                township_id: '',
                state_id: ''
            })
            const active = ref(1)
            const changeStepper = (number) => {
                active.value = number
                /* axios.post("/company", formData.value) */
            }
            const next = (number) => {
                if (active.value++ > number) active.value = 0
            }
            return {
                stepper,
                active,
                changeStepper,
                next,
                formData,
            }
        }
    }
    const app = createApp(App)
    app.use(ElementPlus);
    app.mount('#vue')
</script>
