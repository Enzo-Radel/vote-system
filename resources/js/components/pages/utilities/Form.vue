<template>
    <form :action="rota" method="post" id="enquete-form">

        <input type="hidden" name="_token" :value="csrf_token">
        <input v-if="method == 'edit' " type="hidden" name="_method" value="PUT">

        <div class="form-group" id="group-title">
            <label for="input-title" class="form-label">Título</label>
            <input v-if="method == 'create'" type="text" name="title" id="input-title" class="form-control">
            <input v-else type="text" name="title" id="input-title" class="form-control" :value="enquete.title">
            <p class="text-danger" v-for="error in errors.title" :key="error">{{error}}</p>
        </div>
        <div class="form-group" id="group-dates">
            <label for="input-begin" class="form-label">Início</label>
            <input v-if="method == 'create'" type="date" name="begin" id="input-begin" class="form-control">
            <input v-else type="date" name="begin" id="input-begin" class="form-control" :value="enquete.begin">
            <p class="text-danger" v-for="error in errors.begin" :key="error">{{error}}</p>

            <label for="input-end" class="form-label">Fim</label>
            <input v-if="method == 'create'" type="date" name="end" id="input-end" class="form-control">
            <input v-else type="date" name="end" id="input-end" class="form-control" :value="enquete.end">
            <p class="text-danger" v-for="error in errors.end" :key="error">{{error}}</p>
        </div>

        <hr>
        <div v-if="method == 'create'">
            <div class="d-flex justify-content-between">
                <h4>Respostas</h4>
                <div class="form-group">
                    <label for="input-num-respostas">Número de respostas (Mínimo 3):</label>
                    <input class="form-control" type="number" name="num-respostas" id="input-num-respostas" v-model="totalRespostas">
                </div>
            </div>
            <br>
            <div class="form-group" id="group-all-answers" v-if="totalRespostas >= 3">
                <div v-for="count in parseInt(totalRespostas)" :key="count" class="form-group" id="group-answer">
                    <label :for="'input-resposta-'+count" class="form-label">Resposta {{count}}:</label>
                    <input class="form-control" type="text" :name="'respostas['+count+']'" :id="'input-resposta-'+count">
                </div>
            </div>
        </div>
        <div v-else>
            <div class="d-flex justify-content-between">
                <h4>Respostas</h4>
                <div class="form-group">
                    <label for="input-num-respostas">Número de respostas (Mínimo 3):</label>
                    <input :class="'form-control ' + (totalRespostas < 3 ? 'border-danger text-danger' : '')" type="number" name="num-respostas" id="input-num-respostas" v-model="totalRespostas">
                    <p v-if="totalRespostas < 3" class="text-danger">Valor mínimo é 3 opções</p>
                </div>
            </div>
            <br>
            <div class="form-group" id="group-all-answers" v-if="totalRespostas >= 3">
                <div v-for="count in parseInt(totalRespostas)" :key="count" class="form-group" id="group-answer">
                    <label :for="'input-resposta-'+count" class="form-label">Resposta {{count}}:</label>
                    <input v-if="respostas[count-1]" class="form-control" type="text" :name="'respostas['+count+']'" :id="'input-resposta-'+count" :value="respostas[count-1]">
                    <input v-else class="form-control" type="text" :name="'respostas['+count+']'" :id="'input-resposta-'+count">
                </div>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    props: {
        enquete: Object,
        rota: String,
        method: String,
        csrf_token: String,
        errors: Object,
    },

    data() {
        if (this.method == 'edit') {
            let totalRespostas_tmp = this.enquete.respostas;
            let respostas_tmp = [];
            totalRespostas_tmp.forEach(resposta => {
                respostas_tmp.push(resposta.text);
            });
            return {
                respostas: respostas_tmp,
                totalRespostas: totalRespostas_tmp.length,
                
            }
        } else {
            return {
                totalRespostas: 3,
            }
        }
    }
}
</script>

<style>

</style>