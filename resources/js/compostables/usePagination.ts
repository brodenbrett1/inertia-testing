export function usePagination(paginator: { data: Record<string, unknown>[] }) {
    return {
        ...paginator,
        [Symbol.iterator]() {
            let index = 0;

            return {
                next() {
                    if (index < paginator.data.length) {
                        return {
                            value: paginator.data[index++],
                            done: false,
                        };
                    }

                    return {
                        done: true,
                    };
                },
            };
        },
    };
}
