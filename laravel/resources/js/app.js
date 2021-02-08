/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import ExampleComponent from "./components/ExampleComponent";
import PostComponent from "./components/PostComponent";
window.Vue = require("vue");

const app = new Vue({
    el: "#app",
    components: {
        ExampleComponent,
        PostComponent
    }
});
