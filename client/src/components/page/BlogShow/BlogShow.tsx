import './BlogShow.scss';
import Sidebar from '@/components/base/Sidebar/Sidebar';
import avatarImg from '../../../../public/img/me.png';
import Image from "next/image";

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

type Response = {
  blog: Blog;
};

async function getData(slug: string): Promise<Response> {
  const res = await fetch(`http://127.0.0.1:8000/${slug}`, { cache: 'no-store' });

  if (!res.ok) {
    console.error('error発生');
    throw new Error('Failed to fetch data');
  }

  return res.json();
}

// propsの型を定義
type Props = {
  slug: string
}

export default async function BlogShow(props: Props) {
  const data = await getData(props.slug)

  return (
    <>
      <div className='blog-area'>
        <div className="test">
          <Image src={avatarImg} alt="私" />
          <h2>RailsとNextでアプリ作ってみた。</h2>
          <p>2022/12/21に公開</p>
        </div>

        <div className="blog-container">
          <h2>{data.blog.content}</h2>
        </div>
      </div>

      <div className='side-area'>
        <Sidebar />
      </div>
    </>
  );
}

