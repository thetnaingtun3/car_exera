// import Alpine from "alpinejs";
import {Livewire, Alpine} from '../../vendor/livewire/livewire/dist/livewire.esm';
import "flowbite";

// Alpine.plugin(initFlowbite())
// import Toastify from "toastify-js";
// import TomSelect from "tom-select";
// import Swal from "sweetalert2";

// Import CSS if necessary
// import "toastify-js/src/toastify.css";
// import "tom-select/dist/css/tom-select.css"; // Import TomSelect CSS if it's being used in the project

// Set global objects
// window.Toastify = Toastify;
// window.TomSelect = TomSelect;
// window.Swal = Swal;
// window.Alpine = Alpine;

// Initialize Alpine.js
// document.addEventListener("DOMContentLoaded", () => {
//     Alpine.start();
//     initFlowbite();
// });

initFlowbite();
Livewire.start()
document.addEventListener('livewire:navigated', function () {

    // Alpine.start();
    initFlowbite();
});
