'use client'

import {
  Chart as ChartJS,
  RadialLinearScale,
  PointElement,
  LineElement,
  Filler,
  Tooltip,
  Legend,
} from 'chart.js';
import { Radar } from 'react-chartjs-2';

ChartJS.register(
  RadialLinearScale,
  PointElement,
  LineElement,
  Filler,
  Tooltip,
  Legend
);

// propsの型を定義
type Props = {
  label: string
  data: number[]
  labels: string[]
}

export default function SkillCard(props: Props) {
  const data = {
    labels: props.labels,
    datasets: [
      {
        label: props.label,
        data: props.data,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1,
      },
    ],
  };

  return (
    <div className='skillCard'>
      <Radar data={data} />
    </div>
  )
}
