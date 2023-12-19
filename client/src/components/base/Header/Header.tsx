import './Header.scss'
import Image from "next/image";
import logoImg from '../../../../public/img/logo.png';

export default function Header() {
  return (
    <header>
      <div className="header-container">
        <div className="header-logo">
          <a href="/">
            <Image src={logoImg} alt="ロゴ" />
          </a>
        </div>

        <nav>
          <ul>
            <li>
              <a href="#">私について</a>
            </li>
            <li>
              <a href="">このサイトについて</a>
            </li>
            <li>
              <a href="">ブログ</a>
            </li>
            <li>
              <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                  <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg>
              </a>
            </li>
            <li>
              <a href="#" className='contact-btn'>お問い合わせ</a>
            </li>
          </ul>
        </nav>
      </div>

    </header>
  )
}
