<template>
    <div>
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div class="flex justify-between">
                <button class="text-blue-400" @click="$router.back()">
                    &lt; Back
                </button>
                <div class="relative">
                    <router-link :to="{name: 'EditContact', params: {id: this.$route.params.id}}" class="px-4 py-2 rounded text-green-500 border border-green-500 hover:bg-green-500 hover:text-white">Edit</router-link>
                    <a href="#" class="px-4 py-2 rounded text-red-500 border border-red-500 hover:bg-red-500 hover:text-white" @click='modal = !modal'>Delete</a>
                    
                    <div v-if="modal" class="absolute bg-blue-900 text-white p-4 rounded-lg w-64 right-0 mt-4 z-20">
                        <p>Are You Sure You Want to Delete this Record?</p>
                        <div class="flex justify-end mt-4">
                            <button class="mr-2" @click='modal = !modal'>Cancel</button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded" @click="destroy">Delete</button>
                        </div>
                    </div>
                </div>
                <div v-if="modal" class="bg-black opacity-25 absolute top-0 bottom-0 right-0 left-0 z-10" @click='modal = !modal'></div>
            </div>
            <div class="flex items-center pt-6">
                <UserCircle :name='contact.name' />
                <p class="pl-5 text-xl">{{ contact.name }}</p>
            </div>
            <p class="text-gray-600 pt-6 font-bold uppercase text-sm">Contact</p>
            <p class="text-blue-500 mt-2">{{ contact.email }}</p>
            <p class="text-gray-600 pt-6 font-bold uppercase text-sm">Company</p>
            <p class="text-blue-500 mt-2">{{ contact.company }}</p>
            <p class="text-gray-600 pt-6 font-bold uppercase text-sm">Birthday</p>
            <p class="text-blue-500 mt-2">{{ contact.birthday }}</p>
        </div>
    </div>
</template>

<script>
import UserCircle from '../components/UserCircle';
export default {
    name: 'ShowContact',

    data: function() {
        return {
            contact: null,
            loading: true,
            modal: false,
        }
    },

    mounted() {
        axios.get('/api/contacts/' + this.$route.params.id)
        .then(res =>{
            this.contact = res.data;
            this.loading = false;
        })
        .catch(error => {
            this.loading = false;
            this.$router.push('/contacts');
        });
    },
    components: {
        UserCircle
    },

    methods: {
        destroy: function() {
            axios.delete('/api/contacts/' + this.$route.params.id)
            .then(res => {
                this.$router.push('/contacts');
            })
            .catch(error => {
                this.$router.push('/contacts');
            });
        }
    }

}
</script>

<style>

</style>