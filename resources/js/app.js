import Vue from 'vue';
import {createInertiaApp} from '@inertiajs/inertia-vue';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import { InertiaProgress } from '@inertiajs/progress'
import vuetify from './vuetify'

InertiaProgress.init()

createInertiaApp({
    resolve: (name) => resolvePageComponent(`./${name}.vue`, import.meta.glob('./**/*.vue')),
    setup({el, App, props, plugin}) {
        Vue.use(plugin)
        new Vue({
            vuetify,
            render: h => h(App, props),
        }).$mount(el)
    },
});

