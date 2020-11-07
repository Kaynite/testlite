<template>
    <div>
        <form @submit.prevent="submitForm">
            <InputField name="name" label="Contact Name"  :errors="errors" placeholder="Contact Name" @update:field="form.name = $event" />
            <InputField name="email" label="Contact Email" :errors="errors" placeholder="Contact Email" @update:field="form.email = $event" />
            <InputField name="company" label="Company" :errors="errors" placeholder="Company" @update:field="form.company = $event" />
            <InputField name="birthday" label="Birthday" :errors="errors" placeholder="MM/DD/YYYY" @update:field="form.birthday = $event" />

            <div class="flex justify-end">
                <router-link :to="{name: 'Home'}" type="button" class="px-4 py-2 border text-red-700 rounded hover:border-red-700 mr-4">Cancel</router-link>
                <button class="bg-blue-500 px-4 py-2 text-white rounded hover:bg-blue-400">Add New Contact</button>
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
            errors: null,
        }
    },

    methods: {
        submitForm: function() {
            axios.post('/api/contacts', this.form)
                .then(res => {
                    this.$router.push({name: 'ShowContact', params: {id: res.data.id}});
                })
                .catch(errors => {
                    this.errors = errors.response.data.errors
                });
        }
    }
}
</script>

<style>

</style>