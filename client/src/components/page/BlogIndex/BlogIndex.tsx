import './BlogIndex.scss';
import Sidebar from '@/components/base/Sidebar/Sidebar';
import avatarImg from '../../../../public/img/me.png';
import BlogCard from '@/components/ui/BlogCard/BlogCard';

// responseの型を定義
type Response = {
  blogs: Blog[];
};

// responseの型を定義
type Blog = {
  id: number;
  admin_id: number;
  title: string;
  content: string;
  featured_image: string;
  slug: string;
  public_status: number;
  meta_title: string;
  meta_description: string;
  created_at: string;
  updated_at: string;
};

async function getData(): Promise<Response> {
  const res = await fetch('http://127.0.0.1:8000/', { cache: 'no-store' });

  if (!res.ok) {
    console.error('error発生');
    throw new Error('Failed to fetch data');
  }

  return res.json();
}

export default async function BlogIndex() {
  const data = await getData()

  return (
    <>
      <div className='blog-area'>
        <h2>Articles</h2>

        <div className='blog-container'>
          <div className='flex'>
            {data.blogs.map((blog) => (
                <BlogCard key={blog.id} title={blog.title} imgPath={avatarImg} />
            ))}
          </div>
        </div>
      </div>

      <div className='side-area'>
        <Sidebar />
      </div>
    </>
  );
}
