<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                KudoBoard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="p-grid">
                            <div class="p-col-4" v-for="categorie in categories">
                                <Card>
                                    <template #header>
                                    </template>
                                    <template #title>
                                        
                                    </template>
                                    <template #content>
                                        <Link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" 
                                            href="/kudoboards/" 
                                            :data="{ id: categorie.id }"
                                            method="get">{{categorie.name}}</Link>
                                    </template>
                                    <template #footer>
                                    </template>
                                </Card>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import axios from "axios";
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link
    },
    data () {
        return {
            categories: null,
            filter: null,
            editId: null,
            display: false,
        }
    },
    methods: {
        async getCategories() {
            await axios.get('/api/categorie').then((res) => {
                this.categories = res.data
            })
        },
        async viewCard(id){
            console.log(id)
        }
    },
    mounted() {
        this.getCategories()
    }
}
</script>
