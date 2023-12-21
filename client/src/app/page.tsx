import Index from "@/features/blogs/components/Index"
import { index } from "./apis/blogs";
import { Response } from "@/features/blogs/types/type";

export default async function Home() {
  const data: Response = await index()

  return (
    <>
      <Index blogs={data.blogs} />
    </>
  )
}
