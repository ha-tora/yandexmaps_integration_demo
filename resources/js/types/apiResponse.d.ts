import { PaginationMeta } from "./pagination"

export interface ApiSuccess<T> {
    status: true
    message: string
    data: T
    meta?: PaginationMeta
    errors?: never
}

export interface ApiError {
    status: false
    message: string
    data?: never
    meta?: never
    errors?: Record<string, string[]>
}

export type ApiResponse<T> = ApiSuccess<T> | ApiError