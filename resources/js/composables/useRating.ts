import { ApiResponse } from "@/types/apiResponse";
import { Rating } from "@/types/rating";
import axios from "axios";
import { ref } from "vue";

export const useRating = () => {
    const rating = ref<Rating>();
    const loading = ref<boolean>(false);

    const fetchRating = async () => {
        loading.value = true;
        const { data: response } = await axios.get<ApiResponse<Rating>>(route('api.rating.index'));
        console.log(response);
        if (response.status) {
            rating.value = response.data;
        }
        loading.value = false;
    }

    return {
        rating,
        loading,
        fetchRating,
    }
}