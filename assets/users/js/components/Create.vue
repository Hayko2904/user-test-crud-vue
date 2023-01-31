<template>
    <v-dialog
        v-model="dialog"
        width="500"
        dark
    >
        <v-card flat>
            <v-form
                    ref="form"
                    @submit.prevent="create(user)"
            >
                <v-container fluid>
                    <v-row>
                        <v-col
                                cols="12"
                                sm="6"
                        >
                            <v-text-field
                                    v-model="user.name"
                                    :rules="nameRules"
                                    color="purple darken-2"
                                    label="Name"
                                    required
                            ></v-text-field>
                        </v-col>
                        <v-col
                                cols="12"
                                sm="6"
                        >
                            <v-text-field
                                    v-model="user.phone"
                                    color="blue darken-2"
                                    label="Phone"
                                    type="number"
                            ></v-text-field>
                        </v-col>
                        <v-col
                                cols="12"
                                sm="6"
                        >
                            <v-text-field
                                    v-model="user.email"
                                    :rules="emailRules"
                                    color="purple darken-2"
                                    label="Email"
                            ></v-text-field>
                        </v-col>
                        <v-col
                                cols="12"
                                sm="6"
                        >
                            <v-text-field
                                    v-model="user.password"
                                    color="blue darken-2"
                                    label="Password"
                                    type="number"
                                    required
                            ></v-text-field>
                        </v-col>
                    </v-row>
                </v-container>
                <v-card-actions>
                    <v-btn
                            text
                            @click="resetForm"
                    >
                        Cancel
                    </v-btn>
                    <v-spacer></v-spacer>
                    <v-btn
                            :disabled="!valid"
                            text
                            color="primary"
                            type="submit"
                    >
                        Create
                    </v-btn>
                </v-card-actions>
            </v-form>
        </v-card>
    </v-dialog>
</template>

<script>
    export default {
        name: "Create",

        props: {
            createDialog: false
        },

        data: () => ({
            user: {
                name: '',
                phone: '',
                email: '',
                password: '',
            },
            valid: true,
            nameRules: [
                v => !!v || 'Name is required',
                v => (v && v.length <= 10) || 'Name must be less than 10 characters',
            ],
            emailRules: [
                v => !!v || 'Email is required',
                v => (v && v.length <= 10) || 'Email required',
            ],
        }),

        computed:{
            dialog: {
                get() { return this.createDialog },
            }
        },

        methods: {
            resetForm() {
                this.$emit('close');
                this.$refs.form.reset()
            },
            create(user) {
                this.$store.dispatch('createUser', user)
                this.$refs.form.reset()
                this.$emit('close');
            }
        }
    }
</script>

<style scoped>

</style>