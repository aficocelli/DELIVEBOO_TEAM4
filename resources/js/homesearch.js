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
    slideIndex: 0,
    url: '{{asset(img-carousel/)}}', 
    qty: 0,
    basePrice: 10,
    total: 10,
    show: 'false',
    headerTopSticky: true,
    foodsRestaurant: [],
    lastScrollPosition: 0,
    scrollValue: 0,
    ciao: '',
    typesIndex: []
    
  },
  mounted: function () {

    // event listener sulla scroll
    // document.addEventListener('scroll', this.scrollHandler);
    window.addEventListener('scroll', this.scrollHandler);
    
    axios.get('http://localhost:8000/api/search/types')
      .then((result) => {
        this.types = result.data;
        console.log('types:' + result.data);
      });

    axios.get('http://localhost:8000/api/search/users')
      .then((result) => {
        this.users = result.data;

      });

    axios.get('http://localhost:8000/api/search/foods')
      .then((result) => {
        this.foodsRestaurant = result.data;
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

    buttonTypes: function(e) {

      
      
      axios.get('http://localhost:8000/api/filterapi/' + e , {
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
    addOne: function (e) {

      // this.ciao = e;

      // if(e == event){
      //   this.ciao = event;
      //   this.qty += 1;
      // }
      
      
      
    },
    calc: function () {
      this.total = this.qty * this.basePrice;
    }, 
    
    // funzioni allo scroll per headers

    scrollHandler: function () {
    if (window.scrollY > 150) {
      this.headerTopSticky = false;
      console.log(this.headerTopSticky);
    } else {
      this.headerTopSticky = true;
    }

    //chevron
    // if (window.scrollY > 150) {
    //   this.chevronBackToTop = true;
    // } else {
    //   this.chevronBackToTop = false;
    // }
    }
  },

  //scroll back to top with chevron
  // backToTop: function () {
  //   window.scrollTo({
  //     top: 0,
  //   })
  // },

  
   
  //chevron
  // if (window.scrollY > 150) {
  //   this.chevronBackToTop = true;
  // } else {
  //   this.chevronBackToTop = false;
  // }


 

  // beforeDestroy() {
  //   window.removeEventListener('scroll', this.scrollHandler)
  // }
  

});