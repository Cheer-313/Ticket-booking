import { getUserByEmail, getUserByUserName } from "../database/repositories/userRespository";
import { RegistrationRequest } from "~/types/IRegistation";

const phoneVal = /^\d{10}$/;
const emailVal = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/

export async function validate(data: RegistrationRequest) {
    const errors = new Map<string, { check: InputValidation }>()

    for (const [key, value] of Object.entries(data)) {
        let val = await runChecks(key, value)

        if (val.hasError) {
            errors.set(key, { 'check': val })
        }
    }
    return errors
}

async function runChecks(key: string, value: string): Promise<InputValidation> {
    const check: InputValidation = {
        value,
        isBlank: false,
        lenghtMin8: true,
        key,
        hasError: false
    }

    if (key == 'username') {
        if (value.length < 1) {
            check.hasError = true
            check.errorMessage = `username required`
        }
        check.lenghtMin8 = false
    }

    if (key == 'email') {
        if (value.length < 1) {
            check.hasError = true
            check.errorMessage = `email required`
        }
        check.lenghtMin8 = false
    }

    if (key == 'email') {
        if (value.match(emailVal)) {
            check.hasError = false
        } else {
            check.hasError = true
            check.errorMessage = `invalid email format. Example: company@example.com`
        }
        check.lenghtMin8 = false
    }

    if (key == 'password') {
        if (value.length < 1) {
            check.hasError = true
            check.errorMessage = `password required`
        }
        check.lenghtMin8 = false
    }

    if (key == 'name') {
        if (value.length < 1) {
            check.hasError = true
            check.errorMessage = `full name required`
        }
        check.lenghtMin8 = false
    }

    if (key == 'phone') {
        if (value.length < 1) {
            check.hasError = true
            check.errorMessage = `phone required`
        }
        check.lenghtMin8 = false
    }

    if (key == 'phone') {
        if (value.match(phoneVal)) {
            check.hasError = false
        } else {
            check.hasError = true
            check.errorMessage = `invalid phone format`
        }
        check.lenghtMin8 = false
    }

    if (key == 'password') {
        if (value.length > 0 && value.length < 8) {
            check.hasError = true
            check.errorMessage = `password must be at least 8 characters`
        }
        check.lenghtMin8 = false
    }

    if (key == 'email') {
        const email = await getUserByEmail(value)
        if (email) {
            check.emailTaken = true
            check.hasError = true
            check.errorMessage = `Email is already taken`
        }
    }

    if (key == 'username') {
        const username = await getUserByUserName(value)
        if (username) {
            check.usernameTaken = true
            check.hasError = true
            check.errorMessage = `Username is already taken`
        }
    }

    return check
}
