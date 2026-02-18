import { ApiResponse } from "@/types/apiResponse"
import { Option, OptionDTO } from "@/types/option"
import axios from "axios"
import { ref } from "vue"

export const useOptions = () => {
    const options = ref<Option[]>([]);
    const loading = ref<boolean>(false);

    const fetchOptions = async () => {
        const { data: response } = await axios.get<ApiResponse<Option[]>>(route('api.options.index'));
        if (response.status) {
            options.value = response.data;
        }
    }

    const updateOptions = async () => {
        loading.value = true;
        const data = options.value.map<OptionDTO>((option: Option) => {
            return {
                key: option.key,
                value: option.value
            }
        });
        
        const response = await axios.put<ApiResponse<Option>>(route('api.options.update', data))
        loading.value = false;
        return response.data;
    }

    return {
        options,
        fetchOptions,
        updateOptions,
    }
}