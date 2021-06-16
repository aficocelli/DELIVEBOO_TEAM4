/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
new Vue({
  el: '#root',
  data: {
    mainSelect: '',
    ordine: 0
  },
  methods: {
    incrementa: function incrementa() {
      this.ordine++;
    },
    decrementa: function decrementa() {
      this.ordine--;
    }
  }
});
/******/ })()
;