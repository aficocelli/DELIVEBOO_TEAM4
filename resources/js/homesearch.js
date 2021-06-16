import { default as axios } from "axios";

new Vue({
  el: '#root',
  data: {
    mainSelect: '',
    ordine: 0,
    types:[],
    users: []

  },

  mounted: function () {

    axios.get('http://localhost:8000/api/search/types')
      .then((result) => {
        this.types = result.data;
        console.log(result.data);
      });

    axios.get('http://localhost:8000/api/search/users')
      .then((result) => {
        this.users = result.data;
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

      axios.get('http://localhost:8000/api/search/types')
        .then((result) => {
          this.types = result.data;
          console.log(result.data);
        });
    }
  },

  computed: {
    filteredTypes: function () {
      return this.users.filter((users) => {
        return users.name_restaurant.toLowerCase().match(this.mainSelect.toLowerCase());
      });
    }
  }
});