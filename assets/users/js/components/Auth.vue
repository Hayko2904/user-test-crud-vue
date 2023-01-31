<template>
    <v-form
            ref="form"
            @submit.prevent="login(form)"
            lazy-validation
    >
        <v-text-field
                v-model="form.email"
                label="E-mail"
                required
        ></v-text-field>
        <v-text-field
                v-model="form.password"
                label="Password"
                required
        ></v-text-field>
        <v-btn
                color="success"
                class="mr-4"
                type="submit"
        >
            Login
        </v-btn>
    </v-form>
</template>

<script>
    export default {
        name: "Auth",

        data: () => ({
            valid: true,
            form: {
                email: '',
                password: ''
            }
        }),

        methods: {
            login (data) {
                this.$store.dispatch('login', data)
            }
        },
    }
</script>

<style scoped>

</style>