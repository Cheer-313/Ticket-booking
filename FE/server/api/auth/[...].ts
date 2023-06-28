import { NuxtAuthHandler } from '#auth'
import CredentialsProvider from "next-auth/providers/credentials";
import GoogleProvider from "next-auth/providers/google";
import { PrismaAdapter } from '@next-auth/prisma-adapter';
import { PrismaClient } from '@prisma/client';

import { users } from '~~/db'

const runtimeConfig = useRuntimeConfig()
const prisma = new PrismaClient()

async function getMe(session: any) {
    return await $fetch('api/me', {
        method: 'POST',
        // query: {
        //     API_ROUTE_SECRET: runtimeConfig.API_ROUTE_SECRET,
        // },
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
    callbacks: {
        // jwt: async ({ token, user }) => {
        //     const isSignIn = user ? true : false
        //     if (isSignIn) {
        //         const me = users.find(u => u.email === user.email)
        //         token.subscribed = me?.subscribed
        //     }
        //     return Promise.resolve(token)
        // },
        // session: async ({ session, token }) => {
        //     //  const me = users.find(u => u.email === session?.user?.email);
        //     const me = await getMe(session);
        //     (session as any).subscribed = me?.subscribed;
        //     return Promise.resolve(session)
        // }
    },
    providers: [
        // @ts-expect-error You need to use .default here for it to work during SSR. May be fixed via Vite at some point
        GoogleProvider.default({
            clientId: runtimeConfig.public.GOOGLE_CLIENT_ID,
            clientSecret: runtimeConfig.GOOGLE_CLIENT_SECRET,
            
        })
        
        // CredentialsProvider.default({
        //     name: 'Credentials',
        //     credentials: {
        //         email: {label: 'email', type: 'email'},
        //         password: {label: 'password', type: 'password'}
        //     },
        //     authorize(credentails: any) {
        //         const user = {
        //             id: '1',
        //             email: 'test@gmail.com',
        //             password: 'password'
        //         }

        //         if (credentails?.email === user.email && credentails?.password === user.password) {
        //             return user
        //         } else {
        //             console.error('Warning: Malicious login attempt registered, bad credentials provided')
        //             return null
        //         }
        //     }
        // })
    ],
})