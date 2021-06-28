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
    url: '{{asset(img-carousel/)}}', 
    qty: 0,
    basePrice: 0,
    total: 0,
    show: 'false',
    headerTopSticky: true,
    foodsRestaurant: [],
    onlyFoods:[],
    lastScrollPosition: 0,
    scrollValue: 0,
    ciao: '',
    typesIndex: [],
    test: false,
    addProduct: false,
    userNames:[],
    smallSelection: [],
    chevronBackToTop: false,
    min: 0,
    max: 4,
    indexArray:[],
    checkButton: 0,
    testIndex:[],
    noMatch: false,
    test2:'',
    selectCustom: "",
    genreSelected: [],
    slideNumber: 4
  },
  
  // storage vuejs
  
  watch: {
    
    saveValue(){
      var qtyOld = document.getElementByName('qtyOld');
        for (let index = 0; index < qtyOld.length; index++) {
          // console.log(qtyOld[index].value);
          
        }
      }
    },
  
  mounted: function () {

    // responsive carousel 
    var x = window.matchMedia("(max-width: 1300px)");
    if (x.matches) { // If media query matches
      this.max = 3;
      this.slideNumber = 3;
    }

    var x = window.matchMedia("(max-width: 1020px)");
    if (x.matches) { // If media query matches
      this.max = 2;
      this.slideNumber = 2;
    }

    var x = window.matchMedia("(max-width: 768px)");
    if (x.matches) { // If media query matches
      this.max = 1;
      this.slideNumber = 1;
    }

    //window.localStorage.clear();
    // // ripreso dato in storage
    

    this.ciao = localStorage.getItem("bigTotal");
    // event listener sulla scroll
    // document.addEventListener('scroll', this.scrollHandler);
    window.addEventListener('scroll', this.scrollHandler);
    
    //api types
    axios.get('http://localhost:8000/api/search/types')
      .then((result) => {
        this.types = result.data;
        // console.log('types:' + result.data);
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
    //only foods
    axios.get('http://localhost:8000/api/search/foods/onlyfoods')
      .then((result) => {
        this.onlyFoods = result.data;
      });
    // api small selection index
    axios.get('http://localhost:8000/api/search/selection/users')
      .then((result) => {
        this.smallSelection = result.data;
      });


  },
  methods: {
    //carousel index
    next: function (min, max) {
      this.min = min + this.slideNumber;
      this.max = max + this.slideNumber;
      if (this.max == this.slideNumber * 4) {
        this.min = 0;
        this.max = this.slideNumber;
      }
    },
    prev: function (min, max) {
      if (this.min == 0) {
        this.min = this.slideNumber * 2;
        this.max = this.slideNumber * 3;
      } else {
        this.min = min - this.slideNumber;
        this.max = max - this.slideNumber;
      }
    },

    // scroll index
    scrollToResults: function() {
      var currentPositionOfPage = window.scrollY;
      window.scrollTo(0, 0 + 600);
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
        this.noMatch = false;

        if (this.userRestaurants.length == 0) {
          this.noMatch = true;
        }

        //filtro con vue e non con query
        // console.log(result.data);
        // this.userNames = result.data;
        // console.log('userNames' + this.userNames);

        // this.userNames.forEach(element => {

        //   if (element.name_restaurant.includes(this.filter)) {
        //     this.userRestaurants.push(element);   
        //   }
        // });
        this.scrollToResults();
        // if (this.userRestaurants.length == 0) {
        //   this.test = true;
        // }
      });
    },


    // filtro per type premendo i bottoni sulla homepage
    buttonTypes: function(e) {  
      axios.get('http://localhost:8000/api/filterapi/' + e , {
      }).then((result) => {
        
        this.userRestaurants = result.data;
        this.noMatch = false;
        this.scrollToResults();
      });
    },

    takeOne: function (index) {
      var cart =  [];
      // document.getElementById("button-check").disabled = false;

      var actualValueMore = document.getElementById(index).value;
      document.getElementById(index).value = parseInt(actualValueMore) + 1;

      var productPrice = document.getElementById("prezzo_" + index).innerHTML;
      var total = document.getElementById('totale_price').innerHTML;
      if (total=="0")
      { window.localStorage.clear();}
      var bigTotal = parseFloat(total) + parseFloat(productPrice);
      document.getElementById('totale_price').innerHTML = bigTotal.toFixed(2);  

      this.test2 = bigTotal;  
        
      document.getElementById("button-check").disabled = false;
      
        // window.localStorage.clear();
      window.localStorage.setItem('bigTotal', bigTotal);
        
        
      localStorage.setItem('food_Id_' + index, document.getElementById(index).value);
      
      
    },
    lessOne: function (index) {

        var actualValueLess = document.getElementById(index).value;
        if (actualValueLess > 0) {
          document.getElementById(index).value = parseInt(actualValueLess) -1;
          var productPrice = document.getElementById("prezzo_" + index).innerHTML;
          var total = document.getElementById('totale_price').innerHTML;
          var bigTotal = parseFloat(total) - parseFloat(productPrice);
          document.getElementById('totale_price').innerHTML = bigTotal.toFixed(2);
          //window.localStorage.clear();
          window.localStorage.setItem('bigTotal', bigTotal); 
          // var indexQty = {
          //   'idFood': index,
          //   'qty': document.getElementById(index).value
          // };
          
          // localStorage.setItem('indexQty_' + index, JSON.stringify(indexQty));
          localStorage.setItem('food_Id_' + index, document.getElementById(index).value);
         }   
        {
        localStorage.removeItem('food_Id_' + index);

          if (bigTotal == 0){
            document.getElementById("button-check").disabled = true;
          }
        } 
    },
  
    // funzioni allo scroll per headers
    scrollHandler: function () {
      if (window.scrollY > 150) {
        this.headerTopSticky = false;
        //chevron
        this.chevronBackToTop = true;
        // console.log(this.headerTopSticky);
      } else {
        this.headerTopSticky = true;
        //chevron
        this.chevronBackToTop = false;
      }
    },
     
    //scroll back to top with chevron
    backToTop: function () {
      window.scrollTo({
        top: 0,
      })
    },
  },
  
});