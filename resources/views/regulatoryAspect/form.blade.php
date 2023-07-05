<head>
    <!-- Import style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/element-plus@2.3.1/dist/index.min.css">
</head>
<div class="container" id="vue">
    <div class="card">
        <h5 class="card-header">{{ $modo }} Aspecto Regulatorio</h5>
        <div class="card-body">
            <form>
                <fieldset>
                    <div>
                        <el-checkbox v-model="conservationProgram" :label="'Programa de Conservación'" />
                    </div>
                    <div>
                        <el-checkbox v-model="gasProduction" :label="'Producción de gas'" />
                    </div>
                    <div>
                        <el-checkbox v-model="emergencyPlan" :label="'Plan de emergencia'" />
                    </div>
                </fieldset>

                <fieldset>
                    <div class="m-4">
                        <p>Licencias</p>
                        <el-select v-model="selectLicense" multiple placeholder="Selecciona las licencias"
                            style="width: 240px">
                            <el-option v-for="(name, id) in licenses" :key="id" :label="name"
                                :value="id" />
                        </el-select>
                    </div>
                </fieldset>
            </form>

            <div class="w-100 d-flex justify-content-end">
                <input @click.prevent="save" class="btn btn-success btn-sm mt-2 me-2" type="submit"
                    value="{{ $modo }} Aspecto Regulatorio">
                <a class="btn btn-primary btn-sm mt-2" href="{{ url('regulatoryAspect/') }}">Regresar</a>
            </div>
        </div>
    </div>
</div>

<!-- Import Vue 3 -->
<script src="https://cdn.jsdelivr.net/npm/vue@3.3.4/dist/vue.global.min.js"></script>
<!-- Import component library -->
<script src="https://cdn.jsdelivr.net/npm/element-plus@2.3.1/dist/index.full.min.js"></script>
<!-- Import component library axios-->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    const {
        createApp,
        ref,
    } = Vue
    /*  const axios = "axios" */
    const App = {
        setup() {
            const regulatoryAspect = @json($regulatoryAspect);
            const conservationProgram = ref(regulatoryAspect.conservation_program);
            const gasProduction = ref(regulatoryAspect.gas_production);
            const emergencyPlan = ref(regulatoryAspect.emergency_plan);
            const checkList = ref([conservationProgram.value, gasProduction.value, emergencyPlan.value]);

            const licenses = @json($licenses);
            const value1 = ref([]);
            const selectLicense = ref([]);
            const save = () => {
                const response = axios.post("createRegulatoryAspect", {
                    conservation_program: conservationProgram.value,
                    gas_production: gasProduction.value,
                    emergency_plan: emergencyPlan.value,
                    explosiveness: 0,
                    license_id: selectLicense.value,
                    company_id: 1, 
                });
                window.location.href='/regulatoryAspect'
            }

            return {
                checkList,
                conservationProgram,
                gasProduction,
                emergencyPlan,
                value1,
                licenses,
                selectLicense,
                save,
            }
        }
    }
    const app = createApp(App)
    app.use(ElementPlus);
    app.mount('#vue')
</script>
