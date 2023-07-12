import { faL } from "@fortawesome/free-solid-svg-icons"
import { getUserByEmail, getUserByUserName } from "../database/repositories/userRespository"
import { IUser } from "~/types/IUser"

type ExistsCheck = {
    value: boolean
    message?: string
}

type RegistrationErrors = {
    emailError?: string
    usernameError?: string
}

export async function doesUserExists(email: string, username: string): Promise<ExistsCheck> {
    const hasEmail = await getUserByEmail(email)
    const hasUserName = await getUserByUserName(username)
    const emailExists = hasEmail !== null
    const userNameExists = hasUserName !== null

    const errors: RegistrationErrors = {}

    if (emailExists) {
        errors.emailError = `This email is already registered!`
    }
    if (userNameExists) {
        errors.usernameError = `This username is already registered!`
    }
    if (emailExists || userNameExists) {
        const message = JSON.stringify(errors)
        return { value: true, message }
    }
    return { value: false }
}

export function sanitizeUserForFrontend(user: IUser | undefined): IUser | undefined {
    if (!user) {
        return user
    }
    delete user.password;
    delete user.loginType;

    return user 
}