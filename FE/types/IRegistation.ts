export type IRegistrationErrors = {
    hasErrors?: any
}

export type RegistrationResponse = {
    hasErrors: any,
    errors?: any
}

export type RegistrationRequest = {
    name: any,
    username?: any
    email?: any
    password?: any
    phone ?: any
}