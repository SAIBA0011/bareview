var Vue = require('vue');
Vue.use(require('vue-resource'));
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

new Vue({

    'el': '#app',

    data: {
    	'processing': false,
    	'newEdition': {    		
	    	'name': '',
	    	'description': '',
	    	'release_date': '',
    	}
    },

    methods: {
    	submitForm: function  () {

    		// Set Processing Flag
    		this.processing = true;

    		// Setup Form Data
    		var data = new FormData();
    		data.append('cover', this.$els.cover.files[0]);
    		data.append('featured', this.$els.featured.files[0]);
    		data.append('online', this.$els.online.files[0]);
    		data.append('pdf', this.$els.pdf.files[0]);
    		data.append('name', this.newEdition.name);
    		data.append('description', this.newEdition.description);
    		data.append('release_date', this.newEdition.release_date);

    		// Post to server
    		this.$http.post('/editions', data)
    			.success(function(message) {
    				this.processing = false;
    				alert("Great Job Chap, we are now going to redirect you!");
    				// window.location.href = '/';
    			})
    			.error(function(error) {
    				this.processing = false;
    				alert("Whoops, something we horribly wrong!");
    			});
    	}
    }

});