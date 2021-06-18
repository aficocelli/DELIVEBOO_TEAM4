var app = new Vue(
    {
        el: '#root',
        data: {
            qty: 1,
            basePrice: 10,
            total: 10,
                    
        },
        methods:{
            takeOne: function(){
                this.qty -= 1;
            },
            addOne: function(){
                this.qty += 1;
            },
            calc: function(){
                this.total = this.qty * this.basePrice;
                
            }
      
          

        }
        
    }
    );
  