<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Modulo control de acceso</div>

                    <div class="card-body">
                        <a class="btn btn-primary mt-3 mb-3" href="">
                            Buscar
                        </a>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Torre</th>
                                <th>Piso</th>
                                <th>depto</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(access, index) in accesses.data" :key="index">
                                    <td>{{ access.id }}</td>
                                    <td>{{ access.dni }}</td>
                                    <td>{{ access.name }}</td>
                                    <td>{{ access.lastname }}</td>
                                    <td>{{ access.date }}</td>
                                    <td>{{ access.time }}</td>
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
    // import moment from 'moment'
    import AccessService from '../services/Access'
    export default {
        mounted() {
            this.getAccesses()
        },
        data() {
            return {
                accesses: []
            }
        },
        methods: {
            async getAccesses(){
                this.accesses = await AccessService.index()
            }
        }
    }
</script>
