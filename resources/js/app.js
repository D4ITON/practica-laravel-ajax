
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
$(document).ready(function(){
    $('#alert').hide();
});

document.getElementById('table-select').addEventListener('click', (e)=>{
    //console.log(e.target.nodeName);
    if(e.target.nodeName === 'A'){
        
        if (!confirm('¿Esta seguro de eliminar?')) {
            return false;
        }
        var row = $(e.target).parents('tr');
        var form = $(e.target).parents('form');
        var url = form.attr('action');
        var formId = form.attr('id');
        console.log(formId);
        $('#alert').show();
        
        axios.delete(`/eliminar/`+formId).then((response) => {
            
            console.log(response.data.message);
            row.fadeOut();
            $('#products_total').html(response.data.total);
            $('#alert').html(response.data.message);
            console.log('eliminado');

        }).catch(function (error) {
            console.log(error);
        });
        
    }
})