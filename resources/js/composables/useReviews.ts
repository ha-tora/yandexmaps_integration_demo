import { ApiResponse, ApiSuccess } from "@/types/apiResponse";
import { PaginationMeta } from "@/types/pagination";
import { Review } from "@/types/review";
import axios from "axios";
import { ref } from "vue";

export const useReviews = () => {
    const reviews = ref<Review[]>([]);
    const pagination = ref<PaginationMeta>();
    const loading = ref<boolean>(false);

    const fetchReviews = async (page: number, perPage: number) => {
        loading.value = true;
        const { data: response } = await axios.get<ApiResponse<Review[]>>(route('api.reviews.index'), {
            params: {
                page: page,
                perPage: perPage,
            }
        });
        console.log(response);
        if (response.status) {
            reviews.value = response.data;
            pagination.value = response.meta;
        }
        loading.value = false;
    }

    return {
        reviews,
        pagination,
        loading,
        fetchReviews,
    }
}