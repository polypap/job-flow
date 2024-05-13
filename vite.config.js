import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/backendStyles.css',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            'jQuery': 'jquery/src/jquery',
            '$': 'jQuery'
        },
    }
});
