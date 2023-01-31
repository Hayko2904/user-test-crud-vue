<template>
    <div>
        <v-btn
                @click="() => dialog = true"
                color="lighten-2"
                dark
                v-bind="attrs"
                v-on="on"
        >Create User</v-btn>
        <v-btn
                @click="logout"
                color="lighten-2"
                dark
                v-bind="attrs"
                v-on="on"
        >Logout</v-btn>
    </div>

    <v-table theme="light">
        <thead>
        <tr>
            <th class="text-left">
                Name
            </th>
            <th class="text-left">
                Phone
            </th>
            <th class="text-left">
                Email
            </th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="user in users.data">
            <td>{{user.name}}</td>
            <td>{{user.email}}</td>
            <td>{{user.phone}}</td>
            <td>
                <v-btn @click="editUser(user)">Edit</v-btn>
                <v-btn @click="deleteUser(user)">Delete</v-btn>
            </td>
        </tr>
        </tbody>
    </v-table>
    <div class="text-center">
        <v-pagination
                v-model="page"
                @click="getPaginateRes"
                :length="Math.round(this.users.total / 2)"
                circle
        ></v-pagination>
    </div>
    <Create
        :create-dialog="dialog"
        @close="() => dialog = false"
    />
    <Edit
        :edit-dialog="editDialog"
        :user="editUserData"
        @close="() => editDialog = false"
    />
</template>

<script>
    import { mapGetters } from 'vuex'
    import Create from './Create.vue'
    import Edit from './Edit.vue'

    export default {
        name: "Users",

        components: {
            Edit,
            Create
        },

        data: () => ({
            dialog: false,
            editDialog: false,
            editUserData: {},

            page: 1
        }),

        mounted() {
            this.$store.dispatch('fetchUsers', this.page)
        },

        methods: {
            getPaginateRes() {
                this.$store.dispatch('fetchUsers', this.page)
            },
            editUser(user) {
                this.editDialog = true
                this.editUserData = {...user}
            },
            deleteUser(user) {
                this.$store.dispatch('deleteUser', user)
            },
            logout() {
                this.$store.dispatch('logout', this.$store.state.authUser)
            }
        },

        computed: {
            ...mapGetters([
                'users'
            ])
        }
    }
</script>

<style scoped>

</style>