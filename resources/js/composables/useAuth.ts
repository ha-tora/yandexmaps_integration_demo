// composables/useAuth.js
import { ref } from 'vue'
import { Credentials, RegisterUserDTO, User } from '@/types/user'
import axios from 'axios'
import { router } from '@inertiajs/vue3'

const user = ref<User>();

export function useAuth() {
    function getToken() {
        return localStorage.getItem('token');
    }

    function setToken(token: string) {
        localStorage.setItem("token", token);
    }

    function removeToken() {
        localStorage.removeItem('token');
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

        if (!response.data) {
            throw new Error('Unauthorized');
        }

        setToken(response.data.token);

        return await getUser();
    }

    const register = async (user: RegisterUserDTO) => {
        const { data: response } = await axios.post(route("api.auth.register"), user);

        if (!response.data) {
            throw new Error('Unauthorized');
        }

        setToken(response.data.token);

        return await getUser();
    }

    const logout = async () => {
        removeToken();
        axios.defaults.headers.common['Authorization'] = "";
        user.value = undefined;
        router.visit(route('auth.login'));
    }

    return {
        user,
        getUser,
        login,
        register,
        logout
    }
}
