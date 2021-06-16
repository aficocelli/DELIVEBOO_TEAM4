import { default as axios } from "axios";

new Vue({
  el: '#root',
  data: {
    mainSelect: '',
    ordine: 0,
    types:[]

  },

  mounted: function () {

    axios.get('http://localhost:8000/api/search/types')
      .then((result) => {
        this.types = result.data;
        console.log(result.data);
      });

  },

  methods: {
    incrementa: function () {
      this.ordine++;
    },
    decrementa: function () {
      this.ordine--;
    },

    filterType: function() {
     
    }
  },
});