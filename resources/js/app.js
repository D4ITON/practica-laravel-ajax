
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

// variable para ver si fue presionado el boton de cerrar

$('#alert').hide();

//delegacion de eventos
document.getElementById('table-products').addEventListener('click', (e)=>{
    if(e.target.nodeName === 'A'){

        
        if (!confirm('¿Esta seguro de eliminar?')) {
            return false;
        }
        var row = $(e.target).parents('tr');
        var form = $(e.target).parents('form');
        var formId = form.attr('id');
        
        
        //axios delete
        axios.delete('/eliminar/'+formId).then((response) => {
            
            row.fadeOut();
            $('#alert').fadeIn();
            $('#products_total').html(response.data.total);
            $('#alert-info').html(response.data.message);
            $('#btn-destroy').click(function(){
                $('#alert').fadeOut();
            });

        }).catch(function (error) {
            console.log(error);
        });
    }
});

// inicializacion de datatables
$(document).ready( function () {
    $('#table-products').DataTable();
} );