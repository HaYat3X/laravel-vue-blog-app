// 'use client'
import './AboutMe.scss'
import Image from "next/image";
import meImg from '../../../../public/img/me.png';
import Card from '@/components/ui/Card/Card';
import SkillCard from '@/components/ui/SkillCard.tsx/SkillCard';

export default function AboutMe() {


  return (
    <div className='about-me-area'>
      <section className='banner-area'>
        <div className='banner-container'>
          <div className='profile'>
            <h2>Hayate Takeda.</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi fugit officiis optio ex iste. Debitis enim distinctio commodi dolorem aut asperiores eum atque, eos, magni excepturi quae nihil optio id?</p>
          </div>

          <div className='profile-img'>
            <Image src={meImg} alt="私" />
          </div>
        </div>
      </section>

      <section className='work-area'>
        <div className='work-container'>
          <h2>My Works</h2>
          <div className='flex'>
            <Card title={'「MY CLOSET」'} imgPath={meImg} />
            <Card title={'「Real intentioN」'} imgPath={meImg} />
            <Card title={'「Real intentioN」'} imgPath={meImg} />
            <Card title={'「Real intentioN」'} imgPath={meImg} />
            <Card title={'「Real intentioN」'} imgPath={meImg} />
          </div>
        </div>
      </section>

      <section className='skill-area'>
        <div className='skill-container'>
          <h2>My Skills</h2>
          <div className='flex'>
            <SkillCard label={'backend'} labels={['C#', 'Ruby', 'JavaScript', 'Python', 'PHP']} data={[0, 5, 3, 2, 5]} />
          </div>
        </div>
      </section>
    </div>
  )
}
