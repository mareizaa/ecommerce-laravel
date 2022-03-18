require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue'
import ShoppingCart from "./components/shoppingCart/ShoppingCart";

const app = createApp({})
app.component('shopping-cart', ShoppingCart)
app.mount('#app')
