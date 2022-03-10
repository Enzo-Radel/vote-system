<template>
    <div class="card">
        <div class="card-header">
            <span class="h3">Responder Enquete</span>
        </div>
        <div class="card-body">
            <h4>{{enquete.title}}</h4>
            <br>
            <form :action="rota +'/'+enquete.id+'/save-vote/'" method="post" @submit.prevent="salvarResposta" id="enquete-form">
                <input type="hidden" name="_token" :value="csrf_token">
                <div class="form-check" v-for="resposta in enquete.respostas" :key="resposta.id">
                    <input class="form-check-input" type="radio" name="resposta" :id="'input-resposta-'+resposta.id" :value="resposta.id">
                    <label class="form-check-label" :for="'input-resposta-'+resposta.id">
                        <span>{{resposta.text}} - <strong>VOTOS: {{resposta.votes}}</strong></span>
                    </label>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-success" @click="salvarResposta">Salvar</button>
            <a :href="rota" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        enquete: Object,
        rota: String,
        csrf_token: String,
    },

    methods: {
        salvarResposta() {
            let form = document.getElementById('enquete-form');
            form.submit();
        }
    }
}
</script>

<style>

</style>