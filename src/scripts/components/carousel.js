import Swiper,{Pagination}  from 'swiper';
Swiper.use([ Pagination]);
class Carousel {
    constructor(container, pagination) {
        this.container = container;
        this.pagination = pagination;
        console.log(this.container, this.pagination)
    }

    init() {
        const swiper = new Swiper(this.container, {
            pagination: {
                el: '.swiper-pagination',
            },
            grabCursor: true,
            paginationClickable: true,
            parallax: true,
            speed: 600,
        });
    }
}

export default Carousel;