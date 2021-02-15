<template>
    <div>
        <h2 class="text-center">Dashboard</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="notepad in notepads" :key="notepad.id">
                        <td>{{ notepad.id }}</td>
                        <td>{{ notepad.title }}</td>
                        <td>{{ notepad.description }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <router-link :to="{name: 'edit', params: { id: notepad.id }}" class="btn btn-sm btn-outline-secondary">Editar</router-link>
                                <button class="btn btn-sm btn-outline-secondary" @click="deleteNotepad(notepad.id)">Deletar</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                notepads: []
            }
        },
        created() {
            document.title = "Laravel / Vue - Dashboard";
            this.axios
                .get('notepads')
                .then(response => {
                    this.notepads = response.data.data;
            });
        },
        methods: {
            deleteNotepad(id) {
                if(confirm('Deseja deletar o registro?')){
                    this.axios
                        .delete(`notepads/${id}`)
                        .then(response => {
                            let i = this.notepads.map(data => data.id).indexOf(id);
                            this.notepads.splice(i, 1)
                    });
                }
            }
        }
    }
</script>