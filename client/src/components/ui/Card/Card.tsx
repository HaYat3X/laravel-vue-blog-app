import './Card.scss'
import Image from "next/image";

// propsの型を定義
type Props = {
  title: string
  imgPath: any
}

export default function Card(props: Props) {
  return (
    <div className='card'>
      <Image src={props.imgPath} alt="私" />
      <h5>{props.title}</h5>
    </div>
  )
}
