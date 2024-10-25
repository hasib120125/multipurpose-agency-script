import { createApp } from 'vue';
import App from './layouts/App.vue';
import router from './router/front';
import moment from 'moment';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import { createPinia } from 'pinia';

const app = createApp(App);
const pinia = createPinia();

app
    .use(router)
    .use(pinia)
    .use(VueSweetalert2, { confirmButtonText: 'OK' })
    .component('v-errors', () => import('./components/shared/ValidationErrors.vue'));

app.config.globalProperties.$moment = moment;

app.mount('#app');