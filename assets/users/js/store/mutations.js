let mutations = {
    CREATE_USER(state, user) {
        state.users.data.unshift(user)
    },
    EDIT_USER(state, user) {
        let index = state.users.data.findIndex(item => item.id === user.data.id)

        if (~index) {
            state.users.data[index] = user.data;
        }
    },
    FETCH_USERS(state, users) {
        return state.users = users
    },
    DELETE_USER(state, user) {
        let index = state.users.data.findIndex(item => item.id === user.id)
        state.users.data.splice(index, 1)
    },
    LOGIN_USER(state, user) {
        state.authUser = user
        localStorage.setItem('user', JSON.stringify(user))
    },
    LOGOUT_USER(state) {
        state.authUser = false;
        localStorage.removeItem('user')
    }
}
export default mutations