<template>
    <div>
        <h3 class="text-center">Editar nota</h3>
        <form @submit.prevent="updateNotepad">
            <div class="form-group">
                <label for="formTitle">Título</label>
                <input type="text" class="form-control" id="formTitle" v-model="notepad.title">
            </div>
            <div class="form-group">
                <label for="formDescription">Descrição</label>
                <textarea class="form-control" id="formDescription" rows="3" v-model="notepad.description"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                notepad: {}
            }
        },
        created() {
            document.title = "Laravel / Vue - Editar nota";
            this.axios
                .get(`notepads/${this.$route.params.id}`)
                .then((res) => {
                    this.notepad = res.data.data;
            });
        },
        methods: {
            updateNotepad() {
                this.axios
                    .patch(`notepads/${this.$route.params.id}`, this.notepad)
                    .then((res) => {
                        this.$router.push({ name: 'dashboard' })
                    })
                    .catch(err => (
                        Object.values(err.response.data.errors).forEach(function (val){
                            alert(val);
                        })
                    ))
            }
        }
    }
</script>