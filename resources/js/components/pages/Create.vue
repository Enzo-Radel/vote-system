<template>
    <div class="card">
        <div class="card-header">
            <h2>Criar Enquete</h2>
        </div>
        <div class="card-body">
            <form :action="rota" method="post" id="enquete-form">
                <input type="hidden" name="_token" :value="csrf_token">
                <div class="form-group" id="group-title">
                    <label for="input-title" class="form-label">Título</label>
                    <input type="text" name="title" id="input-title" class="form-control">
                </div>
                <div class="form-group" id="group-dates">
                    <label for="input-begin" class="form-label">Início</label>
                    <input type="date" name="begin" id="input-begin" class="form-control">

                    <label for="input-end" class="form-label">Fim</label>
                    <input type="date" name="end" id="input-end" class="form-control">
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-success" @click="criarEnquete">Cadastrar</button>
            <a :href="rota" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        rota: String,
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