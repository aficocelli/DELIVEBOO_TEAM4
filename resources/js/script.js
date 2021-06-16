// vuejs senza componenti
new Vue({
    el: '#root',
    data: {
        mainSelect: '',
        ordine: 0,
        test: 'hello world',
        
    },
    methods: {
        incrementa: function () {
             this.ordine++;
         },
         decrementa: function () {
             this.ordine--;
         },

    }
});