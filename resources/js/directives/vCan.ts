import { usePage } from '@inertiajs/vue3';
import type { Directive, DirectiveBinding } from 'vue';

// vCan.js
export default {
    mounted: evaluate,
    updated: evaluate,
} as Directive;

function evaluate(el: any, binding: DirectiveBinding<any, string, any>) {
    const permissionKey = binding.value;

    const page = usePage();

    const can = page.props?.can as Record<any, string> | undefined;

    if (can?.[permissionKey]) {
        if (el.parentNode) {
            el.parentNode.removeChild(el);
        }
    }
}
