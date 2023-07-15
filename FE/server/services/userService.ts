import { getUserByEmail, getUserByUserName } from "../database/repositories/userRespository"
import { IUser } from "~/types/IUser"
import { RegistrationRequest } from "~/types/IRegistation"
import { validate } from "./validator"

export async function validateUser(data: RegistrationRequest): Promise<FormValidation> {
    const errors = await validate(data)

    if (errors.size > 0) {
        return { hasErrors: true, errors }
    }
    return { hasErrors: false }
}

export function sanitizeUserForFrontend(user: IUser | undefined): IUser | undefined {
    if (!user) {
        return user
    }
    delete user.password;
    delete user.loginType;

    return user 
}