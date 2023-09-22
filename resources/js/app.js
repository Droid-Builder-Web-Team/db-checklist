import "./bootstrap";
import {
    Livewire,
    Alpine,
} from "../../vendor/livewire/livewire/dist/livewire.esm";
import Clipboard from "@ryangjchandler/alpine-clipboard";
import focus from "@alpinejs/focus";

Alpine.plugin(Clipboard);
Alpine.plugin(focus);
Livewire.start();

// Check if the user prefers dark mode
const prefersDarkMode = window.matchMedia(
    "(prefers-color-scheme: dark)"
).matches;

// Get the root HTML element
const root = document.documentElement;

// Function to enable or disable dark mode
function enableDarkMode() {
    root.classList.add("dark");
}

function disableDarkMode() {
    root.classList.remove("dark");
}

// Set the initial dark mode state based on user preference
if (prefersDarkMode) {
    enableDarkMode();
} else {
    disableDarkMode();
}

// Listen for changes in user preference
window
    .matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", (e) => {
        if (e.matches) {
            enableDarkMode();
        } else {
            disableDarkMode();
        }
    });
