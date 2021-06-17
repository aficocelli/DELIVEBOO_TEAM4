import { default as axios } from "axios";
import { defaultsDeep } from "lodash";

new Vue({
  el: '#root',
  data: {
    mainSelect: '',
    ordine: 0,
    types:[],
    users: [],
    selectType:[],
    type:"",
    usersNew:[],
    userRestaurants:[],
    filter:""
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

    
    filterTypes: function () {

      axios.get('http://localhost:8000/api/filterapi/' + this.filter, {
      }).then((result) => {

        console.log(result.data);
        this.userRestaurants = result.data;
      });

    },
  },

});