import '../styles/show.scss';
import Sidebar from '@/components/base/Sidebar/Sidebar';
import avatarImg from '../../../../public/img/me.png';
import Image from "next/image";
import { Blog } from '../types/type';

// propsの型を定義
type Props = {
  blog: Blog
}

export default function Show(props: Props) {

  return (
    <>
      <div className='blog-area'>
        <div className="test">
          <Image src={avatarImg} alt="私" />
          <h2>{props.blog.title}</h2>
          <p>2022/12/21に公開</p>
        </div>

        <div className="blog-container">
          <h2>{props.blog.content}</h2>
        </div>
      </div>

      <div className='side-area'>
        <Sidebar />
      </div>
    </>
  );
}

