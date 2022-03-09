<template>
    <div class="card">
        <div class="card-header">
            <h2>Editar Enquete: {{enquete.title}}</h2>
        </div>
        <div class="card-body">
            <!-- Componente de fomulário genérico de enquetes -->
            <form-component
                :rota="rota +'/'+enquete.id"
                method="edit"
                :enquete="enquete"
                :csrf_token="csrf_token"
                :errors="errors"
            />
        </div>
        <div class="card-footer">
            <button class="btn btn-success" @click="editarEnquete">Atualizar</button>
            <a :href="rota" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</template>

<script>
import FormComponent from './utilities/Form.vue'

export default {
    components: {
        'form-component': FormComponent
    },

    props: {
        enquete: Object,
        rota: String,
        csrf_token: String,
        errors: Object,
    },

    methods: {
        editarEnquete() {
            let form = document.getElementById('enquete-form');
            form.submit();
        }
    }
}
</script>

<style>

</style>