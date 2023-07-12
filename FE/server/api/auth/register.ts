import { H3Event, sendError } from "h3";
import { IUser } from "~/types/IUser";
// const bcrypt = require('bcrypt')
import { doesUserExists } from "~/server/services/userService";
import { createUser } from "~/server/database/repositories/userRespository";
import { makeSession } from "~/server/services/sessionService";

export default async (event: H3Event) => {
    const body = await readBody(event)
    const name =  body.name
    const username = body.username
    const email: string = body.email
    const password: string = body.password
    const phone = body.phone

    const userExists = await doesUserExists(email, username)

    if (userExists.value === true) {
        sendError(event, createError({ statusCode: 422, statusMessage: userExists.message }))
    }

    // const encryptedPassword: string = await bcrypt.hash(password, 10)

    const userData: IUser = {
        username,
        name,
        email,
        loginType: 'email',
        password,
        phone,
    }

    const user = await createUser(userData)

    return await makeSession(user, event)
}