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
                        <tr v-if="new Date(enquete.begin) > new Date()" class="alert alert-primay" :key="enquete.id">
                            <td data-title="Id">{{enquete.id}}</td>
                            <td data-title="Título">{{enquete.title}}</td>
                            <td data-title="Início">{{new Date(enquete.begin).toLocaleDateString('pt-br')}}</td>
                            <td data-title="Fim">{{new Date(enquete.end).toLocaleDateString('pt-br')}}</td>
                            <td data-title="Estado">Não Iniciada</td>
                            <td data-title="Opções">
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
                        <tr class="alert" v-else-if="new Date(enquete.begin) <= new Date() && new Date(enquete.end) >= new Date()" :key="enquete.id">
                            <td data-title="Id">{{enquete.id}}</td>
                            <td data-title="Título">{{enquete.title}}</td>
                            <td data-title="Início">{{new Date(enquete.begin).toLocaleDateString('pt-br')}}</td>
                            <td data-title="Fim">{{new Date(enquete.end).toLocaleDateString('pt-br')}}</td>
                            <td data-title="Estado">Em Andamento</td>
                            <td data-title="Opções">
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
                            <td data-title="Id">{{enquete.id}}</td>
                            <td data-title="Título">{{enquete.title}}</td>
                            <td data-title="Início">{{new Date(enquete.begin).toLocaleDateString('pt-br')}}</td>
                            <td data-title="Fim">{{new Date(enquete.end).toLocaleDateString('pt-br')}}</td>
                            <td data-title="Estado">Finalizada</td>
                            <td data-title="Opções">
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

<style scoped>
    @media all and (max-width: 900px) {
        td {
            display: block;
            text-align: right;
        }

        td:before {
            content: attr(data-title);
            position: absolute;
            left: 18px;
            display: block;
            font-weight: 600;
            font-size: 1em;
        }

        thead {
            display: none;
        }

        table tbody tr {
            margin-bottom: 10px;
            display: block;
            border: 1px solid #ccc;
        }

        table {
            border-top: none;
        }
    }
</style>