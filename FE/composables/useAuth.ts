import { type } from "os"
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

export async function userLoggedIn() {
    const user = await useUser()
  
    if (!user) {
      return false
    }
  
    if (user?.id == null) {
      return false
    }
  
    return true
}

export async function userLogout() {
    await useFetch('/api/auth/logout')
    useState('user').value = null
    await useRouter().push('/login')
}    

export async function registerWithEmail(username: any, email: any, name: any, password: any, phone: any): Promise<FormValidation> {
    try {
        const { data, error } = await useFetch<ISession>('/api/auth/register', {
            method: 'POST',
            body: { data: { username, email, name, password, phone } }
        })

        if (error.value) {
            type ErrorData = {
                data: ErrorData
            }

            const errorData = error.value as unknown as ErrorData
            const errors = errorData.data.data as unknown as string
            const res = JSON.parse(errors)
            const errorMap = new Map<string, { check: InputValidation; }>(Object.entries(res))
            
            return { hasErrors: true, errors: errorMap }
        }

        if (data) {
            useState('user').value = data
            await useRouter().push('/')
        }
    } catch (e: any) {
        console.log('error: ' + e.toString())
    }
}

export async function loginWithEmail(email: string, password: string) {
    const user = await $fetch<IUser>('/api/auth/login', { method: 'POST', body: { email: email, password: password } })
    useState('user').value = user
    await useRouter().push('/')
}