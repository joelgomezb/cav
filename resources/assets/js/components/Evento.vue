<template>
  <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
          <div class="panel-heading">{{ evento.nombre }}</div>
            <div class="panel-body">
              <div class="col-md-3 pull-right">
                <button type="button" name="inscribir" id="inscribir" class="btn btn-success" @click.prevent="Inscribir">Inscribir</button>
              </div>
              <ul class="">
                  <li> <b>Descripción:</b> {{ evento.descripcion }}</li>
                  <li> <b>Capacidad:</b> {{ evento.capacidad }} Personas</li>
                  <li> <b>Fecha Inicio:</b> {{ evento.fecha_inicio }}</li>
                  <li> <b>Fecha Fin:</b> {{ evento.fecha_fin }}</li>
              </ul>
            </div>
      </div>

      <div class="panel panel-default" v-if="mostrarInscripcion">
          <div class="panel-heading">Asistente de inscripción</div>
            <div class="panel-body">
                <form-wizard @on-complete="onComplete"
                             nextButtonText="Siguiente"
                             backButtonText="Anterior"
                             finishButtonText="Inscribir"
                             :title="evento.nombre"
                             :subtitle="evento.descripcion">
                    <tab-content title="Tipo de Inscripción"
                                 icon="ti-user"
                                 :beforeChange="validateFirstTab">
                                 <div class="col-md-5 col-md-offset-3">
                                   <label for="tipo">Seleccione el tipo de Inscripción a realizar </label>
                                   <select v-model="tipo" class="form-control">
                                      <option value="Particular">Particular</option>
                                      <option value="Estudiante">Estudiante</option>
                                      <option value="Empresa Afiliada CAV">Empresa Afiliada CAV</option>
                                      <option value="Empresa Afiliada CAVECOSE">Empresa Afiliada CAVECOSE</option>
                                      <option value="Empresa Afiliada FECOPORSE">Empresa Afiliada FECOPROSE</option>
                                      <option value="Empresa No Afiliada">Empresa No Afiliada</option>
                                   </select>
                               </div>
                    </tab-content>
                    <tab-content title="Persona que Paga"
                                 icon="ti-settings">
                              <div class="col-md-12 col-md-offset-2" >
                                 <div class="row"  style="margin-bottom: 20px;">
                                   <div class="col-md-2">
                                     <label for="tipo_rif">RIF</label>
                                     <select v-model="personaPaga.tipo_rif" class="form-control" autofocus>
                                        <option value="G">G</option>
                                        <option value="J">J</option>
                                        <option value="V">V</option>
                                     </select>
                                   </div>
                                   <div class="col-md-4">
                                     <label for="rif">RIF </label>
                                     <input type="number" v-model="personaPaga.rif" @keyup.enter="buscarRif" class="form-control">
                                   </div>
                                   <div class="col-md-5">
                                     <label for=""></label><br />
                                     <button type="button" class="btn btn-primary" name="buscarRifButton" @click="buscarRif" :disabled="validateRif">Buscar Rif</button>
                                   </div>
                                </div>

                                <div class="row" v-if="mostrarRif">
                                  <div class="col-md-12">
                                    <div class="row" style="margin-top: 20px;">
                                      <div class="col-md-8">
                                        <div v-if="this.personaPaga.tipo_rif">
                                          <ul>
                                            <li>Nombre: {{ this.personaPaga.nombre }} </li>
                                            <li>Apellido: {{ this.personaPaga.apellido }} </li>
                                            <li>Dirección Fiscal: {{ this.personaPaga.direccion_fiscal }} </li>
                                            <li>Código: {{ this.personaPaga.codigo_telefono }} </li>
                                            <li>Teléfono: {{ this.personaPaga.telefono }} </li>
                                          </ul>
                                       </div>
                                       <div class="alert alert-danger alert-dismissable fade in" v-else>
                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                          <strong>Atención!</strong> RIF No Encontrado.
                                      </div>
                                     </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                    </tab-content>
                    <tab-content title="Last step"
                                 icon="ti-check">
                      Yuhuuu! This seems pretty damn simple
                    </tab-content>
                </form-wizard>
            </div>
      </div>
  </div>
</template>

<script>
    import {FormWizard, TabContent} from 'vue-form-wizard';
    import 'vue-form-wizard/dist/vue-form-wizard.min.css';
    Vue.component('pagination', require('laravel-vue-pagination'));
    import myDatepicker from './myDatepicker.vue';
    export default {
        data() {
          return {
            evento : {},
            mostrarInscripcion: false,
            mostrarRif: false,
            tipo: '',
            personaPaga: {
              tipo_rif: '',
              rif: '',
              nombre: '',
              apellido: '',
              direccion: '',
              codigo_telefono: '',
              telefono: ''
            },
          }
        },
        props:{
          id_evento: '',
        },
        components: {
          'date-picker': myDatepicker,
          'FormWizard': FormWizard,
          'TabContent': TabContent,
        },
        created() {
          this.getEvento();
        },
        methods: {
           getEvento() {
                 axios.get('/evento/show/' + '2')
				               .then(response => {
                           this.evento = response.data[0];
				         });
		        },
            Inscribir: function(){
              this.mostrarInscripcion = !this.mostrarInscripcion;
            },

            cancelar: function(evento){
              return this.mostrarCajas = !this.mostrarCajas;
            },
            onComplete: function(){
                alert('Yay. Done!');
            },

            validateFirstTab: function(){
              return this.tipo === "" ? false : true;
            },

            buscarRif: function(){
              axios.get('/evento/searchRif/' + this.personaPaga.tipo_rif + '/' + this.personaPaga.rif )
                  .then(response => {
                      if (typeof response.data.tipo_rif !== 'undefined'){
                        this.personaPaga = response.data;
                      }
                      else {
                        this.personaPaga = {};
                      }
                      this.mostrarRif = true;
            });
          }
        },
        computed: {
          validateRif: function(){
              return (this.personaPaga.rif != "" && this.personaPaga.tipo_rif != "") ? false : true;
          }
        }
    }
</script>
