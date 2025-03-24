import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

window.Swiper = Swiper;

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

// Initialize Swipers with global variables so we can access them later
let collaborationSwiper;
let testimonialsSwiper;

// Function to initialize or update Swipers
const initSwipers = () => {
    // Check if the collaboration swiper already exists and destroy it
    if (collaborationSwiper) {
        collaborationSwiper.destroy(true, true);
    }

    // Initialize collaboration swiper
    collaborationSwiper = new Swiper('.swiper-collaboration', {
        modules: [Navigation, Pagination, Autoplay],
        loop: true,
        slidesPerView: slidersPerViewRendererCollaboration(),
        spaceBetween: 20,
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

    // Check if the testimonials swiper already exists and destroy it
    if (testimonialsSwiper) {
        testimonialsSwiper.destroy(true, true);
    }

    // Initialize testimonials swiper
    testimonialsSwiper = new Swiper('.swiper-testimonials', {
        modules: [Navigation, Pagination, Autoplay],
        loop: true,
        slidesPerView: slidersPerViewRendererTestimonials(),
        spaceBetween: 48,
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
};

// Initial setup
initSwipers();

// Add event listener for window resize with debounce for performance
let resizeTimeout;
window.addEventListener('resize', () => {
    // Clear the timeout if it exists
    if (resizeTimeout) {
        clearTimeout(resizeTimeout);
    }

    // Set a new timeout to avoid excessive updates during resize
    resizeTimeout = setTimeout(() => {
        initSwipers();
    }, 250); // 250ms debounce delay
});










// import Swiper from 'swiper';
// import { Navigation, Pagination, Autoplay } from 'swiper/modules';
// // import Swiper and modules styles
// import 'swiper/css';
// import 'swiper/css/navigation';
// import 'swiper/css/pagination';

// window.Swiper = Swiper;

// const slidersPerViewRendererCollaboration = () => {
//     if(window.innerWidth > 1280) {
//         return 3;
//     }
//     if (window.innerWidth > 1024) {
//         return 2;
//     }
//     return 1;
// }


// const slidersPerViewRendererTestimonials = () => {
//     if(window.innerWidth > 1280) {
//         return 2;
//     }
//     if (window.innerWidth > 1024) {
//         return 1;
//     }
//     return 1;
// }

// // init Swiper:
// const swiper = new Swiper('.swiper-collaboration', {
//   modules: [Navigation, Pagination , Autoplay],

//   loop: true,

//   slidesPerView: slidersPerViewRendererCollaboration(),
//   spaceBetween:  20,

//   pagination: {
//     el: '.swiper-pagination',
//     clickable: true,
//     type: "fraction",
//   },

//   navigation: {
//     nextEl: '.swiper-button-next',
//     prevEl: '.swiper-button-prev',
//   },

//   autoplay: {
//     delay: 2000,
//     disableOnInteraction: true,
//   },


// });

// const swiper1 = new Swiper('.swiper-testimonials', {
//   modules: [Navigation, Pagination , Autoplay],

//   loop: true,

//   slidesPerView: slidersPerViewRendererTestimonials(),
//   spaceBetween:  48,

//   pagination: {
//     el: '.swiper-pagination',
//     clickable: true,
//     type: "fraction",
//   },

//   navigation: {
//     nextEl: '.swiper-button-next',
//     prevEl: '.swiper-button-prev',
//   },

//   autoplay: {
//     delay: 3000,
//     disableOnInteraction: true,
//   },


// });








