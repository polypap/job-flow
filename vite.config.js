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
            build: {
                chunkSizeWarningLimit: 1600,
                rollupOptions: {
                    output:{
                        manualChunks(id) {
                            if (id.includes('node_modules')) {
                                return id.toString().split('node_modules/')[1].split('/')[0].toString();
                            }
                        }
                    }
                }
            }
        }),
    ],
    resolve: {
        alias: {
            'jQuery': 'jquery/src/jquery',
            '$': 'jQuery'
        },
    }
});
