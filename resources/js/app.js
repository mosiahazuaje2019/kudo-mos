require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import PrimeVue from 'primevue/config';
import mitt from "mitt";
import VueSweetalert2 from "vue-sweetalert2";

import 'primevue/resources/themes/saga-blue/theme.css'
import 'primevue/resources/primevue.min.css'
import 'primeicons/primeicons.css'

import 'primeflex/primeflex.css';

//import libraries
import DataTable from "primevue/datatable";
import InputText from "primevue/inputtext";
import InputNumber from "primevue/inputnumber";
import Column from "primevue/column";
import Dialog from "primevue/dialog";
import ToastService from 'primevue/toastservice';
import Toast from "primevue/toast";
import Card from "primevue/card";
import Textarea from "primevue/textarea";
import Button from "primevue/button";
import Dropdown from "primevue/dropdown";
import Calendar from "primevue/calendar";
import Image from 'primevue/image';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
const emitter = mitt();

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .component('DataTable', DataTable)
            .component('InputText', InputText)
            .component('InputNumber', InputNumber)
            .component('Column', Column)
            .component('Dialog', Dialog)
            .component('Toast', Toast)
            .component('Card', Card)
            .component('TextArea', Textarea)
            .component('PrimeButton', Button)
            .component('Dropdown', Dropdown)
            .component('Calendar', Calendar)
            .component('Image', Image)
            .use(plugin)
            .use(PrimeVue)
            .use(ToastService)
            .use(VueSweetalert2)
            .mixin({ methods: { route } })
            .mount(el);
            vueApp.config.globalProperties.emitter = emitter;
    },
});

InertiaProgress.init({ color: '#4B5563' });
