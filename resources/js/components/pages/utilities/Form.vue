<template>
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
</template>

<script>
export default {
    props: {
        rota: String,
        csrf_token: String,
    }
}
</script>

<style>

</style>