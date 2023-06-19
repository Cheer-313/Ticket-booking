const kebabCase = (string) => string
    ?.normalize("NFD")
    ?.replace(/[\u0300-\u036f]/g, "")
    .replace(/([a-z])([A-Z])/g, "$1-$2")
    .replace(/[\s_]+/g, '-')
    .toLowerCase();

export default kebabCase;