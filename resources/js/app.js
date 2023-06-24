import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

// Check if the user prefers dark mode
const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

// Get the root HTML element
const root = document.documentElement;

// Function to enable or disable dark mode
function enableDarkMode() {
    root.classList.add('dark');
}

function disableDarkMode() {
    root.classList.remove('dark');
}

// Set the initial dark mode state based on user preference
if (prefersDarkMode) {
    enableDarkMode();
} else {
    disableDarkMode();
}

// Listen for changes in user preference
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
    if (e.matches) {
        enableDarkMode();
    } else {
        disableDarkMode();
    }
});
