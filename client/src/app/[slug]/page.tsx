import Show from "@/features/blogs/components/Show"
import { show } from "../apis/blogs";
import { Response } from "@/features/blogs/types/type";

export default async function Home({ params: { slug } }: { params: { slug: string } }) {
  const data: Response = await show(slug)

  return (
    <>
      <Show blog={data.blog}/>
    </>
  )
}
