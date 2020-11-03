import apiClient from "../plugins/axios";

    const state =  {
        authenticated: false,
        user: null
    }

    const getters = {
        authenticated(state){
            return state.authenticated;
        },
        user(state){
            return state.user;
        }
    }

    const mutations = {
        SET_AUTHENTICATED(state,value){
            state.authenticated = value;
        },
        SET_USER (state, value) {
            state.user = value
        }
    }

    const actions = {

        async signIn({dispatch},credentials){
            await apiClient.get('/csrf-cookie')
            try{
               let res  =  await apiClient.post('login', credentials)
               dispatch('me')
               return  res;
            }catch (err) {
               return err.response
            }
        },

        async register({dispatch},credentials){
            await apiClient.get('/csrf-cookie')
            try{
                let res  =  await apiClient.post('register', credentials)
                dispatch('me')
                return res;
            }catch (err) {
                return err.response
            }

        },

        async signOut ({ dispatch }) {
            await apiClient.post('/logout')
            return dispatch('me')
        },

        me ({ commit }) {

           return  apiClient.get('/user').then((response) => {
                commit('SET_AUTHENTICATED', true)
                commit('SET_USER', response.data)
            }).catch(() => {
                commit('SET_AUTHENTICATED', false)
                commit('SET_USER', null)
            })
        }
    }

export default {
    state,
    getters,
    mutations,
    actions
};