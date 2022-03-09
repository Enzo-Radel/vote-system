<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2>Lista de enquetes</h2>
            <a :href="rota +'/create'" class="btn btn-success">Adicionar</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Mudar cor caso não esteja disponível -->
                    <tr v-for="enquete in enquetes" :key="enquete.id">
                        <template v-for="(atributo, index) in enquete">
                            <td v-if="(typeof(atributo) != 'object')" :key="index">
                                <span>{{atributo}}</span>
                            </td>
                        </template>
                        <td>Estado</td>
                        <td>
                            <!-- Valirdar caso não esteja disponível -->
                            <details>
                                <summary>opções</summary>
                                <div class="d-flex flex-column">
                                    <a :href="rota +'/'+ enquete.id" class="btn btn-sm btn-success mt-1">Responder</a>
                                    <a :href="rota +'/'+ enquete.id +'/edit'" class="btn btn-sm btn-primary mt-1">Editar</a>
                                    <form :action="rota +'/'+ enquete.id" class="mt-1" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" :value="csrf_token">
                                        <button type="submit" class="btn btn-sm btn-danger w-100" >Deletar</button>
                                    </form>
                                </div>
                            </details>
                            <!-- <a :href="rota +'/'+ enquete.id" class="btn btn-sm btn-success">Responder</a>
                            <a :href="rota +'/edit/'+ enquete.id" class="btn btn-sm btn-primary">Editar</a>
                            <form :action="rota +'/destroy/'+ enquete.id">
                                <input type="hidden" name="_mehtod" value="DELETE">
                                <input type="hidden" name="_token" :value="csrf_token">
                                <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                            </form> -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        enquetes: Array,
        rota: String,
        csrf_token: String,
    }
}
</script>

<style>

</style>