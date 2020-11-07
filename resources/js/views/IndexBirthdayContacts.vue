<template>
    <div>
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div v-if="contacts.length == 0">No Birthdays This Month!</div>
            <router-link
                :to="{name: 'ShowContact', params: {id: contact.id}}"
                v-for="contact in contacts"
                :key="contact.id"
                v-else
                class="flex items-center p-4 border-b border-gray-400 hover:bg-gray-100">
                <UserCircle :name='contact.name' />
                <div class="ml-4">
                    <p class="font-bold text-blue-500 ">{{ contact.name }}</p>
                    <p>{{ contact.company }}</p>
                </div>
            </router-link>
        </div>

    </div>
</template>

<script>
import UserCircle from '../components/UserCircle';
export default {
    name: 'IndexContacts',

    components: {
        UserCircle
    },

    data: function() {
        return {
            contacts: null,
            loading: true
        }
    },

    mounted() {
        axios.get('/api/birthdays')
        .then(res => {
            this.contacts = res.data;
            this.loading = false;
        })
        .catch(error => {

        });
    }
}
</script>

<style>

</style>