<template>
    <div>
        <button class="text-blue-400 mb-4" @click="$router.back()">
            &lt; Back
        </button>
        <form @submit.prevent="submitForm">
            <InputField name="name" label="Contact Name"  :errors="errors" placeholder="Contact Name" @update:field="form.name = $event" :data="form.name" />
            <InputField name="email" label="Contact Email" :errors="errors" placeholder="Contact Email" @update:field="form.email = $event" :data="form.email" />
            <InputField name="company" label="Company" :errors="errors" placeholder="Company" @update:field="form.company = $event" :data="form.company" />
            <InputField name="birthday" label="Birthday" :errors="errors" placeholder="MM/DD/YYYY" @update:field="form.birthday = $event" :data="form.birthday" />

            <div class="flex justify-end">
                <button type="button" class="px-4 py-2 border text-red-700 rounded hover:border-red-700 mr-4">Cancel</button>
                <button class="bg-blue-500 px-4 py-2 text-white rounded hover:bg-blue-400">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
import InputField from '../components/InputField'
export default {
    name: 'CreateContact',

    components: {
        InputField
    },

    data: function() {
        return {
            form: {
                name: '',
                email: '',
                company: '',
                birthday: '',
            },
            errors: null
        }
    },

    methods: {
        submitForm: function() {
            axios.patch('/api/contacts/' + this.$route.params.id, this.form)
                .then(res => {
                    this.$router.push({name: 'ShowContact', params: {id: this.$route.params.id}});
                })
                .catch(errors => {
                    this.errors = errors.response.data.errors
                });
        }
    },

    mounted() {
        axios.get('/api/contacts/' + this.$route.params.id)
        .then(res =>{
            this.form = res.data;
            this.loading = false;
        })
        .catch(error => {
            this.loading = false;
            this.$router.push('/contacts');
        });
    },
}
</script>

<style>

</style>