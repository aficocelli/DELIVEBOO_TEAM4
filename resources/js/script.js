new Vue({
    el: '#test',
    data: {
        mainSelect: '',
        ordine: 0,
        headerTopSticky: true,
        showNavbar: true,
        lastScrollPosition: 0,

    },
    methods: {
        incrementa: function () {
            this.ordine++;
        },
        decrementa: function () {
            this.ordine--;
        },

        // onScroll() {
        //     const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop
        //     if (currentScrollPosition < 0) {
        //         return
        //     }
        //     if (Math.abs(currentScrollPosition - this.lastScrollPosition) < 50) {
        //         return
        //     }
        //     this.showNavbar = currentScrollPosition < this.lastScrollPosition
        //     this.lastScrollPosition = currentScrollPosition
        // },
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
    mounted: function () {
        window.addEventListener('scroll', this.scrollHandler);
        console.log(window.addEventListener('scroll'));
    },
    beforeDestroy() {
        window.removeEventListener('scroll', this.scrollHandler)
    }
});