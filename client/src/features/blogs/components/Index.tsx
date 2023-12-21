import '../styles/index.scss';
import Sidebar from '@/components/base/Sidebar/Sidebar';
import avatarImg from '../../../../public/img/me.png';
import BlogCard from '@/components/ui/BlogCard/BlogCard';
import { Blog } from '../types/type';

// propsの型を定義
type Props = {
  blogs: Blog[]
}

export default function Index(props: Props) {

  return (
    <>
      <div className='blog-area'>
        <h2>Articles</h2>

        <div className='blog-container'>
          <div className='flex'>
            {props.blogs.map((blog) => (
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
