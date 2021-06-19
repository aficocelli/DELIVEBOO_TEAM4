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
    // carousel: [
    //   'http://127.0.0.1:8000/img-carousel/sushi-6.jpg',
    //   'http://127.0.0.1:8000/img-carousel/hamburger-1.jpg',
    //   'http://127.0.0.1:8000/img-carousel/pizza-7.jpg', 
    // ],
    slideIndex: 0,
    url: '{{asset(img-carousel/)}}', 
    qty: 1,
    basePrice: 10,
    total: 10,
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

      axios.get('http://localhost:8000/api/filterapi/' + this.filter.toLowerCase().toUpperCase(), {
      }).then((result) => {
        this.userRestaurants = result.data;
      });
    },

    buttonTypes: function(value) {
      axios.get('http://localhost:8000/api/filterapi/' + value, {
      }).then((result) => {
        console.log(result.data);
        this.userRestaurants = result.data;
        console.log(this.userRestaurants);
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

    takeOne: function () {
      this.qty -= 1;
    },
    addOne: function () {
      this.qty += 1;
    },
    calc: function () {
      this.total = this.qty * this.basePrice;
    }  
  },

});