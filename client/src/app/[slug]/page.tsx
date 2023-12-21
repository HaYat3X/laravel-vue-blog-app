import BlogShow from "@/components/page/BlogShow/BlogShow"

export default async function Home({ params: { slug } }: { params: { slug: string } }) {
  return (
    <>
      <BlogShow slug={slug}/>
    </>
  )
}
