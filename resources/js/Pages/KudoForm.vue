<template>
<h2>KudoCard of {{ kudo_name }}</h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        
                        <div class="p-fluid">
                            <div class="p-field">
                                <label>Email</label>
                                <InputText v-model="form.email" class="w-100" />
                                <small class="text-red-500">{{ error_email }}</small>
                            </div>
                            <div class="p-field">
                                <label>Comment</label>
                                <TextArea v-model="form.description" rows="5" cols="30" :autoResize="true" />
                                <small class="text-red-500">{{ error_description }}</small>
                            </div>
                            <div class="p-field">
                                <label>Url</label>
                                <InputText v-model="form.uri" class="w-100" />
                                <small class="text-red-500">{{ error_uri }}</small>
                            </div>                            
                            <div class="p-field">
                                <PrimeButton icon="pi pi-save" label="Guardar" class="sm:-bottom-1.5" @click="submit" />
                            </div>
                        </div>

                        <div class="p-grid">
                            <div class="p-col-4" v-for="kudo in kudos">
                                <Card>
                                    <template #header>
                                    </template>
                                    <template #title>
                                        
                                    </template>
                                    <template #content>
                                        <img :src="kudo.uri" />
                                        {{ kudo.description }}
                                    </template>
                                    <template #footer>
                                        from {{ kudo.email }}
                                    </template>
                                </Card>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import axios from "axios";

export default {
    name: "KudoForm",
    components: {
        Head,
    },
    data() {
        return {
            kudos: null,
            kudoboards: null,
            kudo_name: null,
            form: {
                email: null,
                description: null,
                uri:null,
                kudo_board_id: this.$props.editId
            },
            error_email: null,
            error_description: null,
            error_uri: null
        }
    },
    methods: {
        async getKudoBoards(id){
            await axios.get(`/api/kudo_boards/${id}`).then((res) => {
                this.kudoboards = res.data
                this.kudo_name = res.data.name
            })
        },
        async getKudos(id){
            await axios.get(`/api/getKudosByBoard/${id}`).then((res) => {
                this.kudos = res.data
            })            
        },
        cleanForm () {
            Object.keys(this.form).map((val, index) => this.form[index] = null)
        },
        async submit () {
            try {
                const res = await axios.post('/api/kudo_cards', this.form)
                this.cleanForm()
                return this.getKudos(this.$props.editId);
                //return this.emitter.emit('kudos_reload')
            }
            catch (e) {
                if (e.response) {
                    switch (e.response.status) {
                        case 422:
                            let err = e.response.data.errors
                            this.error_email = err.email ? err.email[0] : null
                    }
                }
                return null
            }
        },        
    },
    props: {
        editId: Number,
    },
    mounted() {
        if (this.$props.editId) {
            this.getKudoBoards(this.$props.editId)
            this.getKudos(this.$props.editId);
        }
      
    }    
}
</script>

<style scoped>
.del-btn{
    background-color: firebrick;
    border-bottom-width: 0px;
}
.edit_btn{
    background-color: green;
}
.add-btn{
    margin-bottom: 20px;
}
</style>
