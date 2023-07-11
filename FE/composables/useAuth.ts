import { ISession } from "~/types/ISession"

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