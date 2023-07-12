import { ISession } from "~/types/ISession"
import { IUser } from "~/types/IUser"

export const useAuthCookie = () => useCookie('auth_token')

export async function useUser(): Promise<IUser> {
    const AuthCookie = useAuthCookie().value
    const user = useState<IUser>('user')

    if (AuthCookie && !user.value) {
        const { data } = await useFetch(`/api/auth/getByAuthToken`, {
            headers: useRequestHeaders(['cookie'])
        })
        user.value = data.value
    }
    return user.value
}

export async function userLogout() {
    await useFetch('/api/auth/logout')
    useState('user').value = null
    await useRouter().push('/')
}

export async function registerWithEmail(username: string, email: string, name: string, password: string, phone: string) {
    try {
        const res = await $fetch<ISession>('/api/auth/register', {
            method: 'POST',
            body: { username, email, name, password, phone }
        })

        if (res) {
            useState('user').value = res
            await useRouter().push('/')
        }

    } catch (e: any) {
        console.log('error: ' + e.toString())
    }
}