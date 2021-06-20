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
    qty: 0,
    basePrice: 10,
    total: 10,
    show: 'false',
    headerTopSticky: true,
    foodsRestaurant: [],
    lastScrollPosition: 0,
    scrollValue: 0,
    ciao: ''
    
  },
  

  mounted: function () {

    // event listener sulla scroll
    // document.addEventListener('scroll', this.scrollHandler);
    
    window.addEventListener('scroll', this.onScroll);
    

    axios.get('http://localhost:8000/api/search/types')
    .then((result) => {
      this.types = result.data;
      console.log(result.data);
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

  beforeDestroy() {
    window.removeEventListener('scroll', this.onScroll);
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
    }  
  },

  //scroll back to top with chevron
  // backToTop: function () {
  //   window.scrollTo({
  //     top: 0,
  //   })
  // },

  onScroll: function () {
    console.log("ciao");
    // function scrollToC() { divC.scrollIntoView(); }

    // window.onscroll = function () { console.log('scroll') }
   
    // if (window.pageYOffset < 0) {
    //   return
    // }
    // if (Math.abs(window.pageYOffset - this.lastScrollPosition) < OFFSET) {
    // //   return
    // // }
    // this.headerTopSticky = currentScrollPosition < this.lastScrollPosition;
    // this.lastScrollPosition = window.pageYOffset;
  }
    // if (window.scrollY > 150) {

    //   console.log("ciao");
    //   this.headerTopSticky = false;
    //   console.log(this.headerTopSticky);
    // } else {
    //   this.headerTopSticky = true;
    // }

    //chevron
    // if (window.scrollY > 150) {
    //   this.chevronBackToTop = true;
    // } else {
    //   this.chevronBackToTop = false;
    // }
  

});