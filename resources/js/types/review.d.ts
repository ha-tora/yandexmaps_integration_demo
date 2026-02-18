export interface Review {
  id: string,
  text: string,
  rating: number,
  author: {
    id: string,
    name: string,
  },
  businessId: string,
  createdAt: string,
}