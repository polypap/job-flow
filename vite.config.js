import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/backendStyles.css',
                'resources/js/jobs.js',
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
