import { Response } from '@/features/blogs/types/type';

export async function index(): Promise<Response> {
  const res = await fetch(`http://127.0.0.1:8000`, { cache: 'no-store' });

  if (!res.ok) {
    console.error('error発生');
    throw new Error('Failed to fetch data');
  }

  return res.json();
}

export async function show(slug: string): Promise<Response> {
  const res = await fetch(`http://127.0.0.1:8000/${slug}`, {
    cache: 'no-store',
  });

  if (!res.ok) {
    console.error('error発生');
    throw new Error('Failed to fetch data');
  }

  return res.json();
}
