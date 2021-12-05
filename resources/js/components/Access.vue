<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Libro de visitas</div>
                    <div class="row">
                        <div class="col-md-3">
                            <input
                                v-model="dni"
                                @keypress.enter="getAccesses()"
                                class="form-control ml-4 mt-3 mb-3"
                                type="text"
                                placeholder="Ingrese Rut">
                        </div>
                        <div class="col-md-3">
                            <input
                                v-model="date"
                                @change="getAccesses()"
                                class="form-control mt-3 mb-3"
                                type="date"
                                placeholder="Ingrese fecha">
                        </div>
                        <div class="col-md-3">
                            <a
                                @click.prevent="dni='', date='', getAccesses()"
                                class="btn btn-primary mt-3 mb-3" href="">
                                Limpiar filtros
                            </a>
                        </div>
                        <div class="col-md-3">
                            <button
                                class="btn btn-primary mt-3 mb-3 mr-4"
                                style="float: right;"
                                data-toggle="modal"
                                data-target="#Modal">
                                Nuevo registro
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Torre</th>
                                <th>Piso</th>
                                <th>depto</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(access, index) in accesses.data" :key="index">
                                    <td>{{ access.date | moment("DD-MM-YYYY") }}</td>
                                    <td>{{ access.time }}</td>
                                    <td>{{ access.dni }}</td>
                                    <td>{{ access.name }}</td>
                                    <td>{{ access.lastname }}</td>
                                    <td>{{ access.tower }}</td>
                                    <td>{{ access.floor }}</td>
                                    <td>{{ access.number_depto }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="Modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <access-create
                            @pushAccess=pushAccess>
                        </access-create>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    import AccessService from '../services/Access'
    import AccessCreate from './AccessCreate.vue'
    export default {
  components: { AccessCreate },
        mounted() {
            this.date = moment().format('YYYY-MM-DD')
            this.getAccesses()
        },
        data() {
            return {
                accesses: [],
                access: [],
                dni: '',
                date: '',
                title: '',
            }
        },
        methods: {
            async getAccesses(){
                this.accesses = await AccessService.index(this.dni, this.date)
            },
            pushAccess(access){
                console.log(access)
                $("#Modal").modal('hide')
                this.accesses.data.push(access)
            }
        }
    }
</script>
