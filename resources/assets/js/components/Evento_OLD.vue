<template>
          <div class="panel-body">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <td>Nombre</td>
                  <td>Descripción</td>
                  <td>Fecha Inicio</td>
                  <td>Fecha Fin</td>
                  <td>Acciones</td>
                </tr>
              </thead>
              <tbody>
                <!-- <tr v-for="evento in eventos.data" v-if="eventos.data.length > 0"> -->
                <tr v-for="evento in eventos.data">
                  <td> {{ evento.nombre }} </td>
                  <td>{{ evento.descripcion }}</td>
                  <td>{{ evento.fecha_inicio | fullFecha }}</td>
                  <td>{{ evento.fecha_fin | fullFecha }}</td>
                  <td>
                    <a @click="cancelar(evento.id)" href="#" :style="[evento.estatus == 1 ? rojoAccion : verdeAccion]"><li class="glyphicon glyphicon-ok"></li></a>
                    <li class="glyphicon glyphicon-ban-circle"></li>
                  </td>
                </tr>
            </tbody>
            </table>
            <pagination :data="eventos" v-on:pagination-change-page="getEventos"></pagination>
            <hr />

             <button
                  :class="[mostrarCajas ? 'btn btn-default' : 'btn btn-primary']"
                  type="button"
                  @click.prevent="addEvento">
                  Crear Evento
              </button>

              <div class="panel-body" v-if="mostrarCajas">
                <form class="form-horizontal" method="post" @submit.prevent="storeEvento">
                  <div class="form-group">
                      <label for="nombre" class="col-md-2">Nombre</label>
                      <div class="col-md-6">
                          <input id="nombre" type="text" class="form-control" name="text" v-model="eventos.nombre" required autofocus>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="descripcion" class="col-md-2">Descripcion</label>
                      <div class="col-md-6">
                          <input id="descripcion" type="text" class="form-control" name="descripcion" v-model="eventos.descripcion" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="fecha_inicio" class="col-md-2">Fecha Inicio</label>
                      <div class="col-md-3">
                          <!-- <input id="fecha_inicio" type="text" class="form-control" name="fecha_inicio" v-model="eventos.fecha_inicio" required> -->
                          <date-picker v-model="eventos.fecha_inicio" :date="startTime"></date-picker>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="fecha_fin" class="col-md-2">Fecha Fin</label>
                      <div class="col-md-3">
                          <!-- <input id="fecha_fin" type="text" class="form-control" name="fecha_fin" v-model="eventos.fecha_fin" required> -->
                          <date-picker v-model="eventos.fecha_fin" :date="startTime"></date-picker>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="capacidad" class="col-md-2">Capacidad</label>
                      <div class="col-md-2">
                          <input id="capacidad" type="number" class="form-control" name="capacidad" v-model="eventos.capacidad" required>
                      </div>
                  </div>
                  <button class="btn btn-primary">Guardar</button>
                  <button class="btn btn-danger" @click.prevent="cancelar">Cancelar</button>
                </form>
              </div>
          </div>
</template>

<script>
    Vue.component('pagination', require('laravel-vue-pagination'));
    import myDatepicker from './myDatepicker.vue';
    import swal from 'sweetalert2';
    export default {
        data() {
          return {
            startTime: {
              time: '2017-05-18 00:00'
            },
            endtime: {
              time: ''
            },
            eventos: {},
            mostrarCajas: false,
            newEvento: {
              nombre: '',
              descripcion: '',
              fecha_inicio: '',
              fecha_fin: '',
              capacidad: 0,
              estatus: 1
            },
            rojoAccion: {
                color: 'red'
            },
            verdeAccion: {
                color: 'green'
            }
          }
        },
        components: {
          'date-picker': myDatepicker,
        },
        created() {
          this.getEventos();
        },
        methods: {
          getEventos(page) {
			         if (typeof page === 'undefined') {
				             page = 1;
			          }

                axios.get('/evento/listar?page=' + page)
				              .then(response => {
                          this.eventos = response.data;
				        });
		      },
          addEvento: function(){
            this.mostrarCajas = !this.mostrarCajas;
          },

          cancelar: function(evento){
            return this.mostrarCajas = !this.mostrarCajas;
          }
        }
    }
</script>
