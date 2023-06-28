import { PrismaClient } from "@prisma/client";

let prisma: PrismaClient

declare module 'h3' {
    interface H3EventContent {
        prisma: PrismaClient
    }
}

export default eventHandler(event => {
    if (!prisma) {
        prisma = new PrismaClient()
    }
    event.context.prisma = prisma
})