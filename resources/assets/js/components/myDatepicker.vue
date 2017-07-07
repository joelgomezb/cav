<script>

import myDatepicker from 'vue-datepicker'
export default {
  data () {
    return {
      startTime: {
        time: ''
      },
      endtime: {
        time: ''
      },

      option: {
        type: 'min',
        week: ['Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa', 'Do'],
        month: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        format: 'DD-MM-YYYY HH:mm',
        placeholder: '',
        inputStyle: {
          'display': 'block',
          'width': '100%',
          'height': '36px',
          'padding': '6px 12px',
          'font-size': '14px',
          'line-height': '1.6',
          'color': '#555555',
          'background-color': '#fff',
          'background-image': 'none',
          'border': '1px solid #ccd0d2',
          'border-radius': '4px',
          'box-shadow': 'inset 0 1px 1px rgba(0, 0, 0, 0.075)',
          'transition': 'border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s',
        },
        color: {
          header: '#ccc',
          headerText: '#f00'
        },
        buttons: {
          ok: 'Ok',
          cancel: 'Cancelar'
        },
        overlayOpacity: 0.5, // 0.5 as default
        dismissible: true // as true as default
      },
      timeoption: {
        type: 'min',
        week: ['Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa', 'Do'],
        month: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        format: 'YYYY-MM-DD HH:mm'
      },
      limit: [{
        type: '',
        available: []
      },
      {
        type: 'fromto',
        from: '',
        to: ''
      }]
    }
  },
  components: {
    'date-picker': myDatepicker
  }
}
</script>
<template>
      <date-picker :date="startTime" :option="option" :limit="limit"></date-picker>
</template>
