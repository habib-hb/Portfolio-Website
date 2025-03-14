import AOS from "aos";
import "aos/dist/aos.css"; // Import AOS CSS

// Initializing AOS
AOS.init({
    duration: 1000,
    once: true,
    disable: false,
    startEvent: 'DOMContentLoaded',
    offset: 0
});

window.AOS = AOS;

// document.addEventListener('livewire:navigated', () => {
//     AOS.refresh();
// });

