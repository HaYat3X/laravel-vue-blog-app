/**
 * 公開記事一覧を取得するためのAPIにリクエストを送信します。
 * @param {number} page - 取得するページ番号
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function getPublishedArticle(page: number) {
  try {
    const apiUrl = `http://127.0.0.1:8000/api/article/get_published_article?page=${page}`;

    const response = await fetch(apiUrl, {
      headers: {
        'Content-Type': 'application/json',
      },
    });

    if (!response.ok) {
      return { error: { message: `APIリクエストが失敗しました。 ${response}` } };
    }

    return await response.json();
  } catch (error) {
    return { error: { message: 'APIリクエスト中にエラーが発生しました。' } };
  }
}
