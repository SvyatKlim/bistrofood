import Swiper,{Pagination,Navigation}  from 'swiper';
Swiper.use([ Pagination,Navigation]);
class Carousel {
    constructor(container, pagination) {
        this.container = container;
        this.pagination = pagination;
        console.log(`${this.container} .swiper-button-next`, this.pagination)
    }

    init() {
        const swiper = new Swiper(this.container, {
            pagination: {
                el: `${this.container} .swiper-pagination`,
                dynamicBullets: true,
                clickable: true
            },
            navigation: {
                nextEl: `${this.container} .swiper-button-next`,
                prevEl: `${this.container} .swiper-button-prev`,
            },
            grabCursor: true,
            parallax: true,
            speed: 600,
        });
    }
}

export default Carousel;