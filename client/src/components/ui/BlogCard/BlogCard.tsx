import './BlogCard.scss'
import Image from "next/image";

// propsの型を定義
type Props = {
  title: string
  imgPath: any
}

export default function BlogCard(props: Props) {
  return (
    <div className='blogCard'>
      <Image src={props.imgPath} alt="私" />
      <p>{props.title}</p>
    </div>
  )
}
