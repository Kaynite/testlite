<template>
    <div class="relative mb-4">
        <label :for="name" class="text-xs text-blue-500 uppercase font-bold absolute">{{ label }}</label>
        <input type="text" :id="name" class="w-full border-b border-gray-400 pb-1 pt-6 text-gray-900 focus:outline-none focus:border-blue-500 outline-none" :placeholder="placeholder" @input="updateField()" v-model="value" :class="errorClasses()">
        <small class="text-red-600" v-text="showError()"></small>
    </div>
</template>

<script>
export default {

    props: [ 'name', 'label', 'placeholder', 'errors', 'data' ],

    data: function() {
        return {
            value: ''
        }
    }, 

    methods: {
        updateField: function() {
            this.clearError(this.name);
            this.$emit('update:field', this.value)
        },
        showError: function() {
            if(this.hasError) {
                return this.errors[this.name][0]
            }
        },
        clearError: function() {
            if(this.hasError) {
                this.errors[this.name] = null
            }
        },
        errorClasses: function() {
            return {
                'error-field': this.hasError
            }
        }
    },

    computed: {
        hasError: function() {
            return this.errors && this.errors[this.name] && this.errors[this.name].length > 0;
        }
    },

    watch: {
        data: function(val) {
            this.value = val
        }
    }

}
</script>

<style scoped>
    .error-field {
        @apply border-red-600
    }
</style>