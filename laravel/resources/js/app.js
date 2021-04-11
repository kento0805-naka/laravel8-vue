/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import ExampleComponent from "./components/ExampleComponent";
import PostIndexComponent from "./components/PostIndexComponent";
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
window.Vue = require("vue");
Vue.use(Vuetify);

const app = new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    components: {
        ExampleComponent,
        PostIndexComponent
    }
});
