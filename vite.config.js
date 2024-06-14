import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/app.css',

                'resources/css/welcome.css',

                'resources/css/auth/login.css',
                'resources/css/auth/register.css',
                'resources/css/auth/verify-email.css',

                'resources/css/profile/index.css',
                'resources/js/dropdown.js',
                'resources/css/profile/update_or_create.css'
            ],
            refresh: true,
        }),
    ],
});
