function formatIdentifierKey(input) {
    let value = input.value.replace(/\D/g, "").substring(0, 14);
    let parts = [];

    for (let i = 0; i < value.length; i += 2) {
        parts.push(value.substring(i, i + 2));
    }

    input.value = parts.join("/") + "/";
}