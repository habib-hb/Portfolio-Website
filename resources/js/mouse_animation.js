import LightCursor from './custom_cursor';


// Store a single instance reference
let cursorInstance = null;

// Initialize once at page load with much simpler implementation
document.addEventListener('DOMContentLoaded', () => {
    // Only create if it doesn't exist
    if (!cursorInstance) {
        cursorInstance = new LightCursor({
            size: 15,
            color: '#1a579f',
            removeDefault: false,
        });
    }
});

// For Livewire, just refresh the event listeners
document.addEventListener('livewire:navigated', () => {
    if (cursorInstance) {
        cursorInstance.refresh();
    } else {
        cursorInstance = new LightCursor({
            size: 15,
            color: '#1a579f',
            removeDefault: false,
        });
    }
});


// // Import the library and styles
// import Kursor from 'kursor';
// import 'kursor/dist/kursor.css';

// // Store a single instance reference
// let kursorInstance = null;

// // Initialize once at page load
// document.addEventListener('DOMContentLoaded', () => {
//     // Only create if it doesn't exist
//     if (!kursorInstance) {
//         kursorInstance = new Kursor({
//             type: 1,
//             color: '#000000',
//             removeDefaultCursor: false,
           
//         });
//     }
// });

// // For Livewire, don't completely destroy and recreate
// // Instead, just refresh as needed
// document.addEventListener('livewire:navigated', () => {
//     // Small timeout to let DOM updates complete
//     setTimeout(() => {
//         if (kursorInstance) {
//             // Option 1: Refresh the instance (if available in API)
//             if (typeof kursorInstance.refresh === 'function') {
//                 kursorInstance.refresh();
//             } 
          
//         }
//         else {
//             kursorInstance = new Kursor({
//                 type: 1,
//                 color: '#000000',
//                 removeDefaultCursor: false,
//             });
//         }
//     }, 50);
// });