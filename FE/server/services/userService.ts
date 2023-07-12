import { getUserByEmail, getUserByUserName } from "../database/repositories/userRespository"
import { IUser } from "~/types/IUser"
import { RegistrationRequest } from "~/types/IRegistation"
import { validate } from "./validator"

// type ExistsCheck = {
//     value: boolean
//     message?: string
// }

// type RegistrationErrors = {
//     emailError?: string
//     usernameError?: string
// }

export async function validateUser(data: RegistrationRequest): Promise<FormValidation> {
    const errors = await validate(data)

    if (errors.size > 0) {
        return { hasErrors: true, errors }
    }
    return { hasErrors: false }
}

// export async function doesUserExists(email: string, username: string): Promise<ExistsCheck> {
//     const hasEmail = await getUserByEmail(email)
//     const hasUserName = await getUserByUserName(username)
//     const emailExists = hasEmail !== null
//     const userNameExists = hasUserName !== null

//     const errors: RegistrationErrors = {}

//     if (emailExists) {
//         errors.emailError = `This email is already registered!`
//     }
//     if (userNameExists) {
//         errors.usernameError = `This username is already registered!`
//     }
//     if (emailExists || userNameExists) {
//         const message = JSON.stringify(errors)
//         return { value: true, message }
//     }
//     return { value: false }
// }

export function sanitizeUserForFrontend(user: IUser | undefined): IUser | undefined {
    if (!user) {
        return user
    }
    delete user.password;
    delete user.loginType;

    return user 
}