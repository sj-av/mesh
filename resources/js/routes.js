

import Products from './components/ProductsComponent.vue';
import Product from './components/ProductComponent.vue';

const routes = [
    { path: '/', component: Products },
    { path: '/products', component: Products },
    { path: '/products/:id', component: Products },
    { path: '/product/:id', component: Product },
];

export default routes;