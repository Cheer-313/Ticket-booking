import { H3Event, sendError } from "h3";
import { IUser } from "~/types/IUser";
// const bcrypt = require('bcrypt')
// import { doesUserExists } from "~/server/services/userService";
import { createUser } from "~/server/database/repositories/userRespository";
import { makeSession } from "~/server/services/sessionService";
import { RegistrationRequest } from "~/types/IRegistation";
import { validateUser } from "~/server/services/userService";

export default async (event: H3Event) => {
    const body = await readBody(event)
    const data = body.data as RegistrationRequest

    const validation = await validateUser(data)

    if (validation.hasErrors === true && validation.errors) {
        const errors = JSON.stringify(Object.fromEntries(validation.errors))
        return sendError(event, createError({ statusCode: 422, data: errors }))
    }

    // const name =  body.name
    // const username = body.username
    // const email: string = body.email
    // const password: string = body.password
    // const phone = body.phone

    // const userExists = await doesUserExists(email, username)

    // if (userExists.value === true) {
    //     sendError(event, createError({ statusCode: 422, statusMessage: userExists.message }))
    // }

    // const encryptedPassword: string = await bcrypt.hash(password, 10)

    const userData: IUser = {
        username: data.username,
        name: data.name,
        email: data.email,
        loginType: 'email',
        password: data.password,
        phone: data.phone,
    }

    const user = await createUser(userData)

    return await makeSession(user, event)
}