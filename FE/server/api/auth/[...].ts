import { NuxtAuthHandler } from "#auth";
import GoogleProvider from 'next-auth/providers/google'
import Credentials from "next-auth/providers/credentials";
import { PrismaAdapter } from "@next-auth/prisma-adapter";
import { PrismaClient } from "@prisma/client";
import { users } from "~/db";

const runtimeConfig = useRuntimeConfig()
const prisma = new PrismaClient()

async function getMe(session: any) {
    return await $fetch('/api/me', {
        method: 'POST',
        query: {
            API_ROUTE_SECRET: runtimeConfig.API_ROUTE_SECRET
        },
        body: {
            email: session?.user?.email,
        },
    })
}

export default NuxtAuthHandler({
    pages: {
        signIn: '/login'
    },
    adapter: PrismaAdapter(prisma),
    callbacks: {
        jwt: async({ token, user, account, profile }) => {
            const isSignIn = user ? true: false
            if (isSignIn) {
                // const me = users.find(u => u.email === user.email)
                token.birthday = user ? (user as any).birthday || '' : '';
            }
            return Promise.resolve(token)
        },
        session: async ({ session, token }) => {
            const me = await getMe(session);
            (session as any).birthday = token?.birthday
            return Promise.resolve(session)
        },
    },
    providers: [
        // @ts-expect-error You need to use .default here for it to work during SSR. May be fixed via Vite at some point
        GoogleProvider.default ({
            clientId: '330017885160-me5dmihcnbjcbftv5316otg4pik9p740.apps.googleusercontent.com',
            clientSecret: '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',
            authorization: {
                params: {
                    prompt: "consent",
                    access_type: "offline",
                    response_type: "code"
                }
            }
        }),
        // @ts-expect-error You need to use .default here for it to work during SSR. May be fixed via Vite at some point
        // Credentials.default ({
        //     id: 'credentials',
        //     name: 'Credentials',
        //     credentials: {
        //         email: { label: "email", type: "email", placeholder: "name@company.com" },
        //         password: { label: "password", type: "password" }
        //     },
        //     authorize(credentials: any) {
        //         const user = {
        //             email: 'test@gmail.com',
        //             password: 'password'
        //         }
        //         if (credentials?.email === user.email && credentials?.password === user.password) {
        //             return user
        //         }
        //         else return null
        //     }
        // })

    ],
})