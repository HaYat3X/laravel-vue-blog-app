// import { useRouter } from 'vue-router'
// const router = useRouter();

/**
 * 公開記事一覧を取得するためのAPIにリクエストを送信する
 * @param {number} page
 * @returns {Promise<Object>}  
*/
export async function getPublishedArticle(page: number) {
  try {
    const response = await fetch(`http://127.0.0.1:8000/api/article/get_published_article?page=${page}`, {
      headers: {
        'Content-Type': 'application/json',
      },
    });

    if (!response.ok) {
      console.log('エラーが発生している。');
    }

    return await response.json();
  } catch (error) {
    console.error(error);
    console.log('エラーが発生している。');
  }
}