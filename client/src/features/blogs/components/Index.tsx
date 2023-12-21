import '../styles/index.scss';
import Sidebar from '@/components/base/Sidebar/Sidebar';
import avatarImg from '../../../../public/img/me.png';
import BlogCard from '@/components/ui/BlogCard/BlogCard';
import { index } from '../apis';
import { Blog, Response } from '../types/type';

export default async function Index() {
  const data: Response = await index()

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
