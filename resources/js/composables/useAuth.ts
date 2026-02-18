// composables/useAuth.js
import { ref } from 'vue'
import { Credentials, User } from '@/types/user'
import axios from 'axios'
import { router } from '@inertiajs/vue3'

const user = ref<User>();

export function useAuth() {
    function getToken() {
        return localStorage.getItem('token');
    }

    const getUser = async () => {
        if (user.value) {
            return user
        }

        const token = getToken();
        if (!token) {
            user.value = undefined;
            return user;
        }

        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
        const { data: response } = await axios.get(route('api.account.index'));
        if (!response.data) {
            localStorage.removeItem('token');
        }

        user.value = response.data;
        return user;
    }

    const login = async (credentials: Credentials) => {
        const { data: response } = await axios.post(route("api.auth.login"), credentials);

        const token = response.data.token;

        if (!token) {
            throw new Error('Unauthorized');
        }

        localStorage.setItem("token", token);
        return await getUser();
    }

    const logout = async () => {
        localStorage.removeItem('token');
        axios.defaults.headers.common['Authorization'] = "";
        user.value = undefined;
        router.visit(route('products.index'));
    }

    return {
        user,
        getUser,
        login,
        logout
    }
}
