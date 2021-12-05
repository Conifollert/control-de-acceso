<template>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Nueva visita</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12 mt-2">
                    <!-- Fecha -->
                    <label for="date">Fecha</label>
                    <input v-model="access.date" type="date" id="date" class="form-control" disabled>
                </div>
                <!-- Hora -->
                <div class="col-12 mt-2">
                    <label for="time">Hora</label>
                    <input v-model="access.time" type="time" id="time" class="form-control" disabled>
                </div>
                <!-- Rut -->
                <div class="col-8 mt-2">
                    <label for="dni">Rut</label>
                    <input
                        v-model="access.dni"
                        type="search"
                        id="dni"
                        class="form-control"
                        :class="(errors.dni) ? 'is-invalid' : ''"
                    >
                    <span class="text-danger text-center"
                        v-if="errors && errors.dni">{{errors.dni[0]}}
                    </span>
                </div>
                <!-- Boton buscar -->
                <div class="col-4 mt-2">
                    <button
                        @click.prevent="getAccessByDni()"
                        class="btn btn-success mt-4"
                        style="float: right;">
                        Buscar
                    </button>
                </div>
                <!-- Nombres -->
                <div class="col-12 mt-2">
                    <label for="name">Nombres</label>
                    <input
                        v-model="access.name"
                        type="text" id="name"
                        class="form-control"
                        :class="(errors.name) ? 'is-invalid' : ''"
                    >
                    <span class="text-danger text-center"
                        v-if="errors && errors.name">{{errors.name[0]}}
                    </span>
                </div>
                <!-- Apellidos -->
                <div class="col-12 mt-2">
                    <label for="lastname">Apellidos</label>
                    <input
                        v-model="access.lastname"
                        type="text"
                        id="lastname"
                        class="form-control"
                        :class="(errors.lastname) ? 'is-invalid' : ''"
                    >
                    <span class="text-danger text-center"
                        v-if="errors && errors.lastname">{{errors.lastname[0]}}
                    </span>
                </div>
                <!-- Torre -->
                <div class="col-4 mt-2">
                    <label for="tower">Torre</label>
                    <select
                        v-model="access.tower"
                        class="form-control"
                        id="tower"
                        :class="(errors.tower) ? 'is-invalid' : ''"
                    >
                        <option value="Torre 1">Torre 1</option>
                        <option value="Torre 2">Torre 2</option>
                        <option value="Torre 3">Torre 3</option>
                        <option value="Torre 4">Torre 4</option>
                        <option value="Torre 5">Torre 5</option>
                        <option value="Torre 6">Torre 6</option>
                    </select>
                </div>
                <!-- Piso -->
                <div class="col-4 mt-2">
                    <label for="floor">Piso</label>
                    <select
                        v-model="access.floor"
                        class="form-control"
                        id="floor"
                        :class="(errors.floor) ? 'is-invalid' : ''"
                    >
                        <option value="Piso 1">Piso 1</option>
                        <option value="Piso 2">Piso 2</option>
                        <option value="Piso 3">Piso 3</option>
                        <option value="Piso 4">Piso 4</option>
                        <option value="Piso 5">Piso 5</option>
                    </select>
                </div>
                <!-- Numero departamento -->
                <div class="col-4 mt-2">
                    <label for="number_depto">Número depto</label>
                    <input
                        v-model="access.number_depto"
                        type="text"
                        id="number_depto"
                        class="form-control"
                        :class="(errors.number_depto) ? 'is-invalid' : ''"
                    >
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button @click="store()" type="button" class="btn btn-primary">Registrar</button>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    import AccessService from '../services/Access'
    export default {
        mounted() {
            this.access.date = this.date = moment().format('YYYY-MM-DD')
            this.access.time = this.date = moment().format('HH:mm')
        },
        data() {
            return {
                access: {
                    date: '',
                    time: '',
                    dni: '',
                    name: '',
                    lastname: '',
                    tower: 'Torre 1',
                    floor: 'Piso 1',
                    number_depto: '',
                },
                errors: [],
            }
        },
        methods: {
            async getAccessByDni(){
                const response = await AccessService.getAccessByDni(this.access.dni)
                if(response != '' && response != null){
                    this.access.name = response.name
                    this.access.lastname = response.lastname
                    this.access.tower = response.tower
                    this.access.floor = response.floor
                    this.access.number_depto = response.number_depto
                    this.errors = []
                }
            },
            async store(){
                try {
                    const response = await AccessService.store(this.access)
                    this.$emit('pushAccess', response.data)
                    this.resetInputs()
                }catch (error){
                    if(error.response.status == 422){
                        this.errors = error.response.data.errors
                    }
                }
            },
            resetInputs(){
                this.access.dni            = ''
                this.access.name           = ''
                this.access.lastname       = ''
                this.access.tower          = 'Torre 1'
                this.access.floor          = 'Piso 1'
                this.access.number_depto   = ''
            }
        }
    }
</script>
