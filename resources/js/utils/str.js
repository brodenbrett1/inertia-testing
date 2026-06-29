export function headline(input) {
    return String(input)
        .replace(/([a-z0-9])([A-Z])/g, '$1 $2') // camelCase / PascalCase split
        .replace(/[_\-]+/g, ' ') // snake_case / kebab-case
        .replace(/\s+/g, ' ') // normalize whitespace
        .trim()
        .split(' ')
        .filter(Boolean)
        .map(word =>
            word.charAt(0).toUpperCase() + word.slice(1).toLowerCase(),
        )
        .join(' ');
}
