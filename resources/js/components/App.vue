<template>
    <div class="w-full">
        <div class="flex">
            <div class="h-screen w-48 bg-gray-200 border-gray-400 border-r-2">
                <nav class="p-4">
                    <router-link :to="{name:'Home'}">
                        <p class="text-3xl text-blue-700">Dot</p>
                    </router-link>

                    <div class="nav-group">
                        <p class="text-gray-500 text-xs uppercase mt-12 font-bold">Create</p>
                        <router-link :to="{name:'CreateContact'}" class="hover:text-blue-600 ml-4 my-1 text-sm block">
                            Add New Contact
                        </router-link>
                    </div>

                    <div class="nav-group">
                        <p class="text-gray-500 text-xs uppercase mt-12 font-bold">General</p>
                        <router-link :to="{name: 'IndexContacts'}" class="hover:text-blue-600 ml-4 my-1 text-sm block">
                            Contacts
                        </router-link>
                        <router-link :to="{name: 'Birthdays'}" class="hover:text-blue-600 ml-4 my-1 text-sm block">
                            Birthdays
                        </router-link>
                    </div>

                    <div class="nav-group">
                        <p class="text-gray-500 text-xs uppercase mt-12 font-bold">Settings</p>
                        <button class="hover:text-blue-600 ml-4 my-1 text-sm block" @click="logout">
                            Logout
                        </button>
                    </div>

                </nav>
            </div>
            <div class="flex flex-col flex-1 overflow-y-hidden h-screen">
                <div class="border-b border-gray-400 flex justify-between items-center h-16 px-6">
                    <div>
                        {{ title }}
                    </div>
                    <div class="flex items-center">
                        <SearchBar />
                        <UserCircle :name='user.name' />
                    </div>
                </div>
                <div class="flex flex-col flex-1 overflow-y-hidden">
                    <router-view class="p-6 overflow-x-hidden"></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import UserCircle from "./UserCircle";
import SearchBar from "./SearchBar";
export default {
    name: "App",
    props: ['user'],
    data: function() {
        return {
            searchTerm: '',
            title: ''
        }
    },
    components: {
        UserCircle,
        SearchBar
    },

    created() {
        this.title = this.$route.meta.title;
    },

    methods: {
        logout: function() {
            axios.post('/logout')
                .finally(error => {
                    window.location = '/login'
                });
        }
    },

    watch: {
        $route(to, from) {
            this.title = to.meta.title;
        },
        title: function() {
            document.title = this.title + ' | Dot';
        }
    }

};
</script>

<style></style>
