<template>
    <form :action="rota" method="post" id="enquete-form">

        <input type="hidden" name="_token" :value="csrf_token">
        <input v-if="method == 'edit' " type="hidden" name="_method" value="PUT">

        <div class="form-group" id="group-title">
            <label for="input-title" class="form-label">Título</label>
            <input v-if="method == 'create'" type="text" name="title" id="input-title" class="form-control">
            <input v-else type="text" name="title" id="input-title" class="form-control" :value="enquete.title">
        </div>
        <div class="form-group" id="group-dates">
            <label for="input-begin" class="form-label">Início</label>
            <input v-if="method == 'create'" type="date" name="begin" id="input-begin" class="form-control">
            <input v-else type="date" name="begin" id="input-begin" class="form-control" :value="enquete.begin">

            <label for="input-end" class="form-label">Fim</label>
            <input v-if="method == 'create'" type="date" name="end" id="input-end" class="form-control">
            <input v-else type="date" name="end" id="input-end" class="form-control" :value="enquete.end">
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
    }
}
</script>

<style>

</style>