import Carousel from "./components/carousel";
import CarouselTestimonials from "./components/carouselTestimonials";
import createProductImagePreview from "./admin/formImagePreview";

document.addEventListener('DOMContentLoaded', function () {
    const slider = new Carousel('.js-intro-slider', '.js-intro-slider-pagination');
    const teamsSlider = new CarouselTestimonials('.js-testimonials-slider', '.js-testimonials-slider-pagination');
    slider.init()
    teamsSlider.init()

    // Need to split into another script
    if (document.querySelector('main').classList.contains('admin-panel')){

        createProductImagePreview()
    }

});