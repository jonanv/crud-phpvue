var app = new Vue({
    el: "#app",
    data: {
        createUser: false,
        updateUser: false,
        deleteUser: false,
        paisajes: [],
        selected: {},
        url: null,
        message: ""
    },
    mounted: function() {
        this.showPaisajes();
    },
    methods: {
        showImage: function() {
            var _this = this;
            _this.file = _this.$refs.foto.files[0];
            _this.url = URL.createObjectURL(_this.file);
        },
        showPaisajes: function() {
            axios.get("http://localhost:8888/crudpaisajes-phpvue/api.php?action=read")
                .then(function(response) {
                    console.log(response);
                    // app.message = response.data.message;
                    app.paisajes = response.data.paisajes;
                });
        },
        createPaisajes: function() {
            let formdata = new FormData();
            formdata.append("nombre", document.getElementById("nombre").value);
            formdata.append("descripcion", document.getElementById("descripcion").value);
            formdata.append("foto", document.getElementById("foto").files[0]);

            axios.post("http://localhost:8888/crudpaisajes-phpvue/api.php?action=create", formdata)
                .then(function(response) {
                    console.log(response);
                    app.message = response.data.message;
                    $('.close').click();
                    app.showPaisajes();
                    app.createUser = false;
                });
        },
        updatePaisajes: function() {
            let formdata = new FormData();
            formdata.append("id", document.getElementById("id").value);
            formdata.append("nombre", document.getElementById("nombre").value);
            formdata.append("descripcion", document.getElementById("descripcion").value);
            formdata.append("foto", document.getElementById("foto").files[0]);

            axios.post("http://localhost:8888/crudpaisajes-phpvue/api.php?action=update", formdata)
                .then(function(response) {
                    console.log(response);
                    app.message = response.data.message;
                    $('.close').click();
                    app.showPaisajes();
                    app.updateUser = false;
                });
        },
        deletePaisajes: function() {
            let formdata = new FormData();
            formdata.append("id", document.getElementById("id").value);

            axios.post("http://localhost:8888/crudpaisajes-phpvue/api.php?action=delete", formdata)
                .then(function(response) {
                    console.log(response);
                    app.message = response.data.message;
                    $('.close').click();
                    app.showPaisajes();
                    app.deleteUser = false;
                });
        },
        selectPaisaje: function(paisaje) {
            app.selected = paisaje;
        }
    }
});