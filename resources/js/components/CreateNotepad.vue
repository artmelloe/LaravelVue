<template>
    <div>
        <h3 class="text-center">Nova nota</h3>
        <form @submit.prevent="addNotepad">
            <div class="form-group">
                <label for="formTitle">Título</label>
                <input type="text" class="form-control" id="formTitle" v-model="notepad.title" :rules="['Required']">
            </div>
            <div class="form-group">
                <label for="formDescription">Descrição</label>
                <textarea class="form-control" id="formDescription" rows="3" v-model="notepad.description"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Criar</button>
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
            document.title = "Laravel / Vue - Nova nota";
        },
        methods: {
            addNotepad() {
                this.axios
                    .post('notepads', this.notepad)
                    .then(response => (
                        this.$router.push({ name: 'dashboard' })
                    ))
                    .catch(err => (
                        Object.values(err.response.data.errors).forEach(function (val){
                            alert(val);
                        })
                    ))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>