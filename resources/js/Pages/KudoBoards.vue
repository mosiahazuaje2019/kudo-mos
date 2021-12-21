<template>

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                KudoBoard {{name_category}}
            </h2>
        </template>

        <div class="py-12 bg-blue-600">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <DataTable :filters="filters" :value="kudoboards" dataKey="id" responsiveLayout="scroll" :paginator="true" :rows="20">
                        <Column field="name" header="Nombre" :sortable="true">
                            <template #filter="{filterModel}">
                                <InputText type="text" v-model="filterModel.value" class="p-column-filter" placeholder="Search by name"/>
                            </template>
                        </Column>
                        <Column field="email" header="Correo" :sortable="true">
                            <template #filter="{filterModel}">
                                <InputText type="text" v-model="filterModel.value" class="p-column-filter" placeholder="Search by email"/>
                            </template>
                        </Column>
                        <Column class="justify-center" field="birthday" header="Fecha de cumpleaños" :sortable="true" />
                        <Column bodyStyle="justify-center" header="Acción"
                                headerStyle="width: 14rem; text-align: center">
                            <template #body="slotProps">
                                <span class="mr-1 justify-center"><PrimeButton label="Kudos" @click="viewKudos(slotProps.data.id)" /></span>
                            </template>
                        </Column>                                                                
                    </DataTable>                    
                </div>
            </div>

            <Dialog :style="{width:'50vw'}" v-model:visible="display" header="Kudo Form" :maximizable="true" :modal="true">
                <KudoForm :editId="editId" />
            </Dialog>

        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import axios from "axios";
import KudoForm from "@/Pages/KudoForm"

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        KudoForm
    },
    data () {
        return {
            kudoboards: null,
            categories: null,
            name_category: null,
            filter: null,
            editId: null,
            display: false,
        }
    },
    methods: {
        async getKudoCards(id) {
            await axios.get(`/api/getKudos/${id}`).then((res) => {
                this.kudoboards = res.data
            })
        },
        async getCategories(id) {
            await axios.get(`/api/categorie/${id}`).then((res) => {
                this.categories = res.data
                this.name_category = this.categories.name;
            })
        },
        async viewKudos(id) {
            this.editId = id
            this.display = true
        }
    },
    mounted() {
        let uri = window.location.search.substring(1); 
        let params = new URLSearchParams(uri);
        console.log(params.get("id"));
        let id = params.get("id");
        this.getKudoCards(id);
        this.getCategories(id);
    }
}
</script>
