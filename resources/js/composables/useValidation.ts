import { reactive, ref } from 'vue'

export function useValidation(rules: Record<string, string | Function[]>) {
  const errors = reactive<Record<string, string[]>>({});

  const validate = (values: Record<string, string>) => {
    let isValid = true;

    Object.keys(rules).forEach(field => {
      errors[field] = [];

      const valueErrors = validateField(values[field], rules[field]);
      if (valueErrors.length !== 0) {
        errors[field] = valueErrors;
        isValid = false;
      }
    })

    return isValid
  }

  const validateField = (value: string, rules: string | Function[]): string[] => {
    const errors: string[] = [];

    if (typeof rules === 'string') rules = parseRules(rules);

    for (const rule of rules) {
      const result = rule(value);

      if (result !== true) {
        errors.push(result);
      }
    }

    return errors;
  }

  const parseRules = (jsonRules: string): Function[] => {
    const rulesString: string[] = JSON.parse(jsonRules);
    const rules: Function[] = [];
    for (const rule of rulesString) {
      const [ruleName, ...args] = rule.split(':');
      rules.push((v: string) => ruleFunctions[ruleName](v, args.join(':')));
    }
    return rules;
  }

  const ruleFunctions: Record<string, Function> = {
    required: (v: string) => !!v || 'Поле обязательно для заполнения',
    regex: (v: string, arg: string) => parseRegex(arg).test(v) || 'Значение поля должно иметь заданный формат',
  }

  const parseRegex = (regex: string): RegExp => {
    const lastSlash = regex.lastIndexOf("/")

    if (lastSlash <= 0) return new RegExp(regex);

    const pattern = regex.slice(1, lastSlash)
    const flags = regex.slice(lastSlash + 1)

    return new RegExp(pattern, flags)
  }

  const setErrors = (errors: Record<string, string[]>) => {
    Object.keys(errors).forEach((field) => {
      errors[field] = errors[field]
    })
  }

  return {
    errors,
    validate,
    setErrors,
  }
}