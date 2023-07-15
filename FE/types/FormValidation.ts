type FormValidation = {
    hasErrors: any
    errors?: Map<any, { check: InputValidation; }>
}

type FormErrors = {
    field: any
    check: InputValidation
}