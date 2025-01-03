// vite.config.js

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    // server: {
    //     host: '127.0.0.1', // lub 'localhost'
    //     port: 5173,
    // },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/style.css',
                'resources/js/app.js',
                'resources/js/hidden.js',
                'resources/js/fading.js',
                'resources/js/links.js',
                'resources/js/eye.js',
                'resources/js/participants.js',
            ],
            refresh: true,
        }),
    ],
});
