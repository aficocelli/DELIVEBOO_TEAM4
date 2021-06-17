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
    restaurants:[],
    search:""
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

    // onChange: function(){
    //   console.log(this.selectType);
    //   if()
    // },
    // searchTypes: function (index) {

    //   let link = 'http://localhost:8000/api/select/types'
    //   axios.get(link, {
    //     params: {
    //       type: index + 1
    //     }
    //   }).then((result) => {
    //     console.log(result.data);
    //     this.usersNew = result.data;
    //   });
    // },
    // filterType: function() {

    //   axios.get('http://localhost:8000/api/search/types')
    //     .then((result) => {
    //       this.types = result.data;
    //       console.log(result.data);
    //     });
    // }
    filterGenre: function () {

      axios.get('http://localhost:8000/api/filterapi/' + this.search, {
        // params: {
        //   search: this.search
        // }
      }).then((result) => {

        console.log(result.data);
        this.restaurants = result.data;
        //console.log(this.restaurants);
      });

    },
  },

  computed: {
    // filteredTypes: function () {
    //   return this.users.filter((users) => {
    //     return users.name_restaurant.toLowerCase().match(this.mainSelect.toLowerCase());
    //   });
    // }
  }
});