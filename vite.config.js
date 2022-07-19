


import {defineConfig} from 'vite';
import {createVuePlugin} from 'vite-plugin-vue2'
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        createVuePlugin({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: path.resolve(__dirname, './node_modules/vue/dist/vue.runtime.esm.js'),
        },
        dedupe: ['vuetify', 'vue'],
        extensions: [
            ".mjs",
            ".js",
            ".ts",
            ".jsx",
            ".tsx",
            ".json",
            ".vue",
            ".scss",
        ]
    }
});
