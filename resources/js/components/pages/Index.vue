<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span class="h3">Lista de enquetes</span>
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
                    <!-- Não Iniciada -->
                    <template v-for="enquete in enquetes">
                        <tr v-if="new Date(enquete.begin) > new Date()" class="alert alert-primary" :key="enquete.id">
                            <template v-for="(atributo, index) in enquete">
                                <td v-if="(typeof(atributo) != 'object')" :key="index">
                                    <span>{{atributo}}</span>
                                </td>
                            </template>
                            <td>Não Iniciada</td>
                            <td>
                                <!-- Valirdar caso não esteja disponível -->
                                <details>
                                    <summary>opções</summary>
                                    <div class="d-flex flex-column">
                                        <!-- <a :href="rota +'/'+ enquete.id" class="btn btn-sm btn-success mt-1">Responder</a> -->
                                        <a :href="rota +'/'+ enquete.id +'/edit'" class="btn btn-sm btn-primary mt-1">Editar</a>
                                        <form :action="rota +'/'+ enquete.id" class="mt-1" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" :value="csrf_token">
                                            <button type="submit" class="btn btn-sm btn-danger w-100" >Deletar</button>
                                        </form>
                                    </div>
                                </details>
                            </td>
                        </tr>

                        <!-- Em Andamento -->
                        <tr v-else-if="new Date(enquete.begin) <= new Date() && new Date(enquete.end) >= new Date()" :key="enquete.id">
                            <template v-for="(atributo, index) in enquete">
                                <td v-if="(typeof(atributo) != 'object')" :key="index">
                                    <span>{{atributo}}</span>
                                </td>
                            </template>
                            <td>Em Andamento</td>
                            <td>
                                <!-- Valirdar caso não esteja disponível -->
                                <details>
                                    <summary>opções</summary>
                                    <div class="d-flex flex-column">
                                        <a :href="rota +'/'+ enquete.id" class="btn btn-sm btn-success mt-1">Responder</a>
                                        <!-- <a :href="rota +'/'+ enquete.id +'/edit'" class="btn btn-sm btn-primary mt-1">Editar</a> -->
                                        <form :action="rota +'/'+ enquete.id" class="mt-1" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" :value="csrf_token">
                                            <button type="submit" class="btn btn-sm btn-danger w-100" >Deletar</button>
                                        </form>
                                    </div>
                                </details>
                            </td>
                        </tr>

                        <!-- Finalizada -->
                        <tr v-else :key="enquete.id" class="alert alert-danger">
                            <template v-for="(atributo, index) in enquete">
                                <td v-if="(typeof(atributo) != 'object')" :key="index">
                                    <span>{{atributo}}</span>
                                </td>
                            </template>
                            <td>Finalizada</td>
                            <td>
                                <!-- Valirdar caso não esteja disponível -->
                                <details>
                                    <summary>opções</summary>
                                    <div class="d-flex flex-column">
                                        <!-- <a :href="rota +'/'+ enquete.id" class="btn btn-sm btn-success mt-1">Responder</a>
                                        <a :href="rota +'/'+ enquete.id +'/edit'" class="btn btn-sm btn-primary mt-1">Editar</a> -->
                                        <form :action="rota +'/'+ enquete.id" class="mt-1" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" :value="csrf_token">
                                            <button type="submit" class="btn btn-sm btn-danger w-100" >Deletar</button>
                                        </form>
                                    </div>
                                </details>
                            </td>
                        </tr>
                    </template>
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
    },

    data() {
        return {
            
        }
    }
}
</script>

<style>

</style>