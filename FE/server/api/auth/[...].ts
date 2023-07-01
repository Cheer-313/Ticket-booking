import { NuxtAuthHandler } from '#auth'
import CredentialsProvider from "next-auth/providers/credentials";
import GoogleProvider from "next-auth/providers/google";
import { PrismaAdapter } from '@next-auth/prisma-adapter';
import { PrismaClient } from '@prisma/client';

const runtimeConfig = useRuntimeConfig()
const prisma = new PrismaClient()

async function getMe(session: any) {
    return await $fetch('api/me', {
        method: 'POST',
        body: {
            email: session?.user?.email,
        }
    })
}
export default NuxtAuthHandler({
    pages: {
        signIn: '/login',
    },
    adapter: PrismaAdapter(prisma),
    providers: [
        // @ts-expect-error You need to use .default here for it to work during SSR. May be fixed via Vite at some point
        GoogleProvider.default({
            clientId: runtimeConfig.public.GOOGLE_CLIENT_ID,
            clientSecret: runtimeConfig.GOOGLE_CLIENT_SECRET,
            
        })
    ],
})