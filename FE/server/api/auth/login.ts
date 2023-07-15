import { sanitizeUserForFrontend } from "~/server/services/userService";
import { getUserByEmail } from "~/server/database/repositories/userRespository";
import { H3Event, sendError, use } from "h3";
import { makeSession } from "~/server/services/sessionService";

export default async (event: H3Event) => {
    const body = await readBody(event)
    const email: string = body.email
    const password: string = body.password
    const user = await getUserByEmail(email)

    if (user === null) {
        sendError(event, createError({ statusCode: 401, statusMessage: 'Unauthenticated' }))
    }

    if (password !== user?.password) {
        sendError(event, createError({ statusCode: 401, statusMessage: 'Unauthenticated' }))
    }

    await makeSession(user, event)

    return sanitizeUserForFrontend(user)
}