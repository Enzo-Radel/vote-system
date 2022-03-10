<template>
    <div class="card">
        <div class="card-header">
            <span class="h3">Criar Enquete</span>
        </div>
        <div class="card-body">
            <form-component
                :rota="rota"
                :errors="errors"
                method="create"
                :csrf_token="csrf_token"
            />
        </div>
        <div class="card-footer">
            <button class="btn btn-success" @click="criarEnquete">Cadastrar</button>
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
        rota: String,
        errors: Object,
        csrf_token: String,
    },

    methods: {
        criarEnquete() {
            let form = document.getElementById('enquete-form');
            form.submit();
        }
    }
}
</script>

<style>

</style>