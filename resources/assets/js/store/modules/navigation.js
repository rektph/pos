
// initial state
export const state = { 
    drawer: false,
    items: [
        { title: 'Home', icon: 'dashboard' },
        { title: 'About', icon: 'question_answer' }
    ]
}

// getters
export const getters = {
    drawer: state => state.drawer,
    items: state => state.items
}

// actions
export const actions = {
    changeDrawer: ({commit}) => commit('showDrawer')
}

// mutations
export const mutations = {
    showDrawer(state) {
        state.drawer = !state.drawer
    }
}