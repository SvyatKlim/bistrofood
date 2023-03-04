import Carousel from "./components/carousel";
import CarouselTestimonials from "./components/carouselTestimonials";
import buyProduct from "./components/buyProduct";

document.addEventListener('DOMContentLoaded', function () {
    const slider = new Carousel('.js-intro-slider', '.js-intro-slider-pagination');
    const teamsSlider = new CarouselTestimonials('.js-testimonials-slider', '.js-testimonials-slider-pagination');
    slider.init();
    teamsSlider.init();
    if (document.querySelector('body').classList.contains('home')){
        buyProduct();
    }
});