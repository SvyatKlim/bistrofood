import Carousel from "./components/carousel";
import CarouselTestimonials from "./components/carouselTestimonials";

document.addEventListener('DOMContentLoaded', function () {
    const slider = new Carousel('.js-intro-slider', '.js-intro-slider-pagination');
    const teamsSlider = new CarouselTestimonials('.js-testimonials-slider', '.js-testimonials-slider-pagination');
    slider.init()
    teamsSlider.init()
});