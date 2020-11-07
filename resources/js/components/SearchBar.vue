<template>
    <div>
        <input v-model="searchTerm" id="searchTerm" type="text" placeholder="Search..." class="bg-gray-200 border border-gray-400 rounded-full px-4 py-1 mr-4 w-64 focus:outline-none focus:bg-gray-100 focus:border-blue-400 focus:shadow" @input="search">
        <div class="absolute bg-blue-900 text-white p-4 rounded-lg mt-1 z-10" v-if="showContacts">
            <div v-if="contacts.length == 0">
                <p>No Results for '{{ searchTerm }}'</p>
            </div>
            <div v-else @click.stop="showContacts = false">
                <router-link :to="{name: 'ShowContact', params: {id: contact.id}}" class="border-b border-gray-500 p-2 flex items-center hover:bg-blue-700" v-for="contact in contacts" :key="contact.id" >
                    <UserCircle :name="contact.name" />
                    <div class="ml-3">
                        <p class="font-bold">{{ contact.name }}</p>
                        <p class="text-gray-400">{{ contact.email }}</p>
                    </div>
                </router-link>
            </div>

        </div>
    </div>
</template>

<script>
import UserCircle from './UserCircle';
export default {
    name: 'SearchBar',
    data: function() {
        return {
            searchTerm: '',
            contacts: null,
            showContacts: false
        }
    },

    components: {
        UserCircle
    },

    methods: {
        search: function() {
            if(this.searchTerm.length > 0) {
                axios.post('/api/search', {searchTerm: this.searchTerm})
                    .then(res => {
                        this.contacts = res.data;
                        this.showContacts = true
                    })
                    .catch(error => {

                    });
            } else {
                this.showContacts = false;
            }
        },
        clearSearch: function() {
            this.searchTerm = '';
        }
    }
}
</script>

<style>

</style>