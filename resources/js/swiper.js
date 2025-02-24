import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const slidersPerViewRendererCollaboration = () => {
    if(window.innerWidth > 1280) {
        return 3;
    }
    if (window.innerWidth > 1024) {
        return 2;
    }
    return 1;
}


const slidersPerViewRendererTestimonials = () => {
    if(window.innerWidth > 1280) {
        return 2;
    }
    if (window.innerWidth > 1024) {
        return 1;
    }
    return 1;
}

// init Swiper:
const swiper = new Swiper('.swiper-collaboration', {
  modules: [Navigation, Pagination , Autoplay],

  loop: true,

  slidesPerView: slidersPerViewRendererCollaboration(),
  spaceBetween:  20,

  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    type: "fraction",
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  autoplay: {
    delay: 2000,
    disableOnInteraction: true,
  },


});

const swiper1 = new Swiper('.swiper-testimonials', {
  modules: [Navigation, Pagination , Autoplay],

  loop: true,

  slidesPerView: slidersPerViewRendererTestimonials(),
  spaceBetween:  48,

  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    type: "fraction",
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  autoplay: {
    delay: 3000,
    disableOnInteraction: true,
  },


});




