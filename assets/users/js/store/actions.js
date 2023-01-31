import axios from 'axios'

let actions = {
    createUser({commit}, user) {
        axios.post('/api/users', user)
            .then(res => {
                commit('CREATE_USER', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    editUser({commit}, user) {
        axios.put('/api/users/' + user.id, user)
            .then(res => {
                commit('EDIT_USER', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchUsers({commit}, page = 1) {
        axios.get('/api/users?page=' + page)
            .then(res => {
                commit('FETCH_USERS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteUser({commit}, user) {
        console.log(user)
        axios.delete(`/api/users/${user.id}`)
            .then(res => {
                if (res)
                    console.log()
                    commit('DELETE_USER', user)
            }).catch(err => {
        })
    },
    login({commit}, data) {
        axios.post('/api/login', data)
            .then(res => {
                console.log(res.da)
                if (!res.data.error) {
                    commit('LOGIN_USER', res.data)
                }
            }).catch(err => {
        })
    },
    logout({commit}) {
        axios.get('/api/logout')
            .then(res => {
                if (res?.data?.success) {
                    commit('LOGOUT_USER')
                }
            }).catch(err => {
        })
    }
}

export default actions