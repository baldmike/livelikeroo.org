import Vue from 'vue' 
import Vuex from 'vuex'
import VueCookie from 'vue-cookie'

// to make API calls
import { router } from './router'
import axios from 'axios'

Vue.use(Vuex)
Vue.use(VueCookie)

export default new Vuex.Store({

    state() {
        let userToken = Vue.cookie.get('token');
        let user = Vue.cookie.get('user');

        let currentUser = JSON.stringify(user);

        console.log("[STORE.STATE] --> user: " + (currentUser));
        console.log("[STORE.STATE] --> token: " + (userToken));

        return {
            token: userToken ? userToken : null,
            user: user ? user : null,
            oneTime: true,
            monthly: false,
            users: [],
            modals: {
                dnForm: false,
                cpForm: false,
                login: false
            },
            alerts: {
                info: false,
                success: false,
                warning: false,
                danger: false,
            },
            loading: false,
            message: ''
            
        }
    },
    getters: { 
        // getters get data from state and are available in components

        // !! returns a boolean  --  if there is a token, the user is authenticated
        isAuthenticated: state => !!state.token,
        currentUser: state => state.user,
        isOneTime: state => state.oneTime,
        isMonthly: state => state.Monthly,
    },
    mutations: {
        // mutations are committed by actions, and are the ONLY way to manipulate state

        setLoginCred(state, payload) {
            state.token = payload.token;
            state.user = payload.user;
            state.isAuthenticated = true;
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token
        },
        setUser(state, user) {
            state.user = user;
        },
        setUsers(state, payload) {
            state.users = payload.data;
        },
        setOneTime(state) {
            state.oneTime = true;
            state.monthly = false;
            state.modals.dnForm = true;
        },
        setMonthly(state) {
            state.oneTime = false;
            state.monthly = true;
            state.modals.dnForm = true;
        },
        notify(state, payload) {
            console.log(payload);
            state.message = payload.message;
            state.alerts[payload.type] = true;
        },
        clearNotifications(state) {
            for (var key in state.alerts) {
                if (state.alerts.hasOwnProperty(key)) {
                  state.alerts[key] = false;
                }
            }
        },
        showCpForm(state) {
            state.modals.cpForm = true;
        },
        showLogin(state) {
            state.modals.login = true;
        },
        hideModal(state) {
            state.modals.dnForm = false;
            state.modals.cpForm = false;
            state.modals.login = false;
        },
        startLoading(state) {
            state.loading = true;
        },
        endLoading(state) {
            state.loading = false;
        },
        logout(state) {
            state.token = null;
            state.user = null;
            state.isAuthenticated = false;
            Vue.cookie.delete('token');
            Vue.cookie.delete('user');
        },
    },
    actions: {
        // actions are dispatched in component, they commit mutations

        setLoginCred(context, payload) {
            context.commit('setLoginCred', payload)
        },
        refreshUserData(context) {
            axios.call("get", "/api/user").then((userData) => {
                let user = userData.data.data
                console.log("USER ----> " + user);
                context.commit('setUser', user)
            })
        },
        setOneTime(context) {
            context.commit('setOneTime');
        },
        setMonthly(context) {
            context.commit('setMonthly');
        },
        showCpForm(context) {
            context.commit('showCpForm');
        },
        showLogin(context) {
            context.commit('showLogin');
        },
        getAllUsers(context) {
            axios.call("get", "/api/users").then(({ data }) => {
                // console.log("[API call to users]: " + JSON.stringify(data));
                context.commit('setUsers', data);
            })
            .catch(error => {
                console.log("API call error: " + error);
            });
        },
        hideModal(context) {
            context.commit('hideModal');
        },
        startLoading(context) {
            context.commit('startLoading');
        },
        endLoading(context) {
            context.commit('endLoading');
        },
        notify(context, payload) {
            context.commit('notify', payload);
        },
        logout( { commit }) {
        
            axios.post("/api/logout").then((userData) => {        
                let payload = {
                    type: "success",
                    message: "You have successfully logged out."
                }

                commit('logout');
                commit('notify', payload);

                
                router.push({ path: '/' });
            })
        },
        clearNotifications(context) {
            context.commit('clearNotifications');
        }
    }

})