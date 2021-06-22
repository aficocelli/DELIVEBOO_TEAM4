import { default as axios } from "axios";
import { forEach } from "lodash";

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
    basePrice: 0,
    total: 0,
    show: 'false',
    headerTopSticky: true,
    foodsRestaurant: [],
    lastScrollPosition: 0,
    scrollValue: 0,
    ciao: '',
    typesIndex: [],
    test: false,
    addProduct: false,
    userNames:[],
    smallSelection: []
  },

  // storage vuejs

 
  
  mounted: function () {

    // // ripreso dato in storage
    
    this.ciao = localStorage.getItem("bigTotal");
    // event listener sulla scroll
    // document.addEventListener('scroll', this.scrollHandler);
    window.addEventListener('scroll', this.scrollHandler);
    
    //api types
    axios.get('http://localhost:8000/api/search/types')
      .then((result) => {
        this.types = result.data;
        console.log('types:' + result.data);
      });
    
    // api users
    axios.get('http://localhost:8000/api/search/users')
      .then((result) => {
        this.users = result.data;

      });
    
    // api foods
    axios.get('http://localhost:8000/api/search/foods')
      .then((result) => {
        this.foodsRestaurant = result.data;
      });
    
    // api small selection index
    axios.get('http://localhost:8000/api/search/selection/users')
      .then((result) => {
        this.smallSelection = result.data;
      });
  },
  methods: {
    incrementa: function () {
      this.ordine++;
    },
    decrementa: function () {
      this.ordine--;
    },
    
    //filtro con la input della homepage per tipo (non usata)
    filterTypes: function () {
      axios.get('http://localhost:8000/api/filterapi/' + this.filter.toLowerCase().toUpperCase(), {
      }).then((result) => {
        this.userRestaurants = result.data;
        if (this.userRestaurants.length == 0) {
          this.test = true;
        }
      });
    },

    // filtro con la input della homepage per nome
    filterName: function() {  
      this.userRestaurants = [];
      axios.get('http://localhost:8000/api/search/' + this.filter.toLowerCase().toUpperCase(), {  
      }).then((result) => {

        this.userRestaurants = result.data;

        //filtro con vue e non con query
        // console.log(result.data);
        // this.userNames = result.data;
        // console.log('userNames' + this.userNames);

        // this.userNames.forEach(element => {

        //   if (element.name_restaurant.includes(this.filter)) {
        //     this.userRestaurants.push(element);   
        //   }
        // });

        console.log(this.userRestaurants);
        // if (this.userRestaurants.length == 0) {
        //   this.test = true;
        // }
      });
    },


    // filtro per type premendo i bottoni sulla homepage
    buttonTypes: function(e) {  
      axios.get('http://localhost:8000/api/filterapi/' + e , {
      }).then((result) => {
        console.log(result.data);
        
        this.userRestaurants = result.data;
        console.log(this.userRestaurants);
      });
    },

    //carousel
    // prev: function() {
    //   this.slideIndex--;
    //   if(this.slideIndex < 0) {
    //     this.slideIndex = this.carousel.length - 1;
    //   }
    // },

    // next: function () {
    //   this.slideIndex++;
    //   if (this.slideIndex == this.carousel.length) {
    //     this.slideIndex = 0;
    //   }
    // },

    takeOne: function (index) {
      var actualValueMore = document.getElementById(index).value;
      // console.log(actualValueMore);
      document.getElementById(index).value = parseInt(actualValueMore) + 1;
      var productPrice = document.getElementById("prezzo_" + index).innerHTML;
      var total = document.getElementById('totale_price').innerHTML;
      var bigTotal = parseFloat(total) + parseFloat(productPrice);
      document.getElementById('totale_price').innerHTML = bigTotal;
      window.localStorage.clear();
      window.localStorage.setItem('bigTotal', bigTotal);
      
      document.getElementById("result").innerHTML = localStorage.getItem("bigTotal");
    },
    lessOne: function (index) {

      var actualValueLess = document.getElementById(index).value;
      if (actualValueLess > 0) {
        document.getElementById(index).value = parseInt(actualValueLess) -1;
        var productPrice = document.getElementById("prezzo_" + index).innerHTML;
        var total = document.getElementById('totale_price').innerHTML;
        var bigTotal = parseFloat(total) - parseFloat(productPrice);
        document.getElementById('totale_price').innerHTML = bigTotal;
      //  window.localStorage.clear();
       window.localStorage.setItem('bigTotal', bigTotal);
        
      }
      // this.ciao = e;

      // if(e == event){
      //   this.ciao = event;
      //   this.qty += 1;
      // }
      
      
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