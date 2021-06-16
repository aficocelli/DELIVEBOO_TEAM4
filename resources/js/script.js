new Vue({
    el: '#root',
    data: {
        mainSelect: '',
        ordine: 0,

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