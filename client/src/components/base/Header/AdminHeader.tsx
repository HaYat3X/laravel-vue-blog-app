import './AdminHeader.scss'
import Image from "next/image";
import logoImg from '../../../../public/img/logoB.png';

export default function AdminHeader() {
  return (
    <header>
      <div className="header-container">
        <div className="header-logo">
          <a href="/">
            <Image src={logoImg} alt="ロゴ" />
          </a>
        </div>
      </div>
    </header>
  )
}
