import { default as axios } from "axios";

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
    filter:"",
    carousel: [
      'http://127.0.0.1:8000/img-carousel/pizza-7.jpg', 
      'http://127.0.0.1:8000/img-carousel/hamburger-1.jpg', 
      'http://127.0.0.1:8000/img-carousel/sushi-6.jpg'
    ],
    slideIndex: 0,
    url: '{{asset(img-carousel/)}}',   
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

    prev: function() {
      this.slideIndex--;
      if(this.slideIndex < 0) {
        this.slideIndex = this.carousel.length - 1;
      }
    },

    next: function () {
      this.slideIndex++;
      if (this.slideIndex == this.carousel.length) {
        this.slideIndex = 0;
      }
    },

    
  },

});