// vite.config.js

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/style.css',

                'resources/js/app.js',
                'resources/js/hidden.js',
                'resources/js/fading.js',
                'resources/js/links.js',
                'resources/js/lightbox.js',
                'resources/js/eye.js',
                'resources/js/participants.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        sourcemap: false // Wyłączenie map źródłowych
    }
});
