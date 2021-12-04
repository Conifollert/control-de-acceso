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
                            <a class="btn btn-primary mt-3 mb-3" href="">
                                Nuevo registro
                            </a>
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
                                    <td>{{ access.time.substring(0, access.time.length - 3) }}</td>
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
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    import AccessService from '../services/Access'
    export default {
        mounted() {
            this.date = moment().format('YYYY-MM-DD')
            this.getAccesses()
        },
        data() {
            return {
                accesses: [],
                dni: '',
                date: '',
            }
        },
        methods: {
            async getAccesses(){
                this.accesses = await AccessService.index(this.dni, this.date)
            }
        }
    }
</script>
