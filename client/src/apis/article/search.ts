/**
 * 記事の検索結果を取得するためのAPIにリクエストを送信します
 * @param {any} keyword 検索するキーワード
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function getPublishedArticleKeyword(keyword: any) {
  try {
    const apiUrl = `https://rapid-tsukumi-6067.lolipop.io/api/article/get_article_search_result`;
    console.log(keyword);
    const formData = new FormData();
    const jsonKeyword = JSON.stringify(keyword);
    formData.append('keyword', jsonKeyword);
    console.log(formData);

    const response = await fetch(apiUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        keyword: keyword,
      }),
    });

    const responseData = await response.json();

    if (response.status === 500) {
      return { internalServerError: { message: responseData.message } };
    }

    return await responseData;
  } catch (error) {
    return { internalServerError: { message: 'APIリクエスト中にエラーが発生しました。' } };
  }
}

/**
 * 記事の検索結果を取得するためのAPIにリクエストを送信します
 * @param {any} tag 検索するタグ
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function getPublishedArticleTag(tag: any) {
  try {
    const apiUrl = `https://rapid-tsukumi-6067.lolipop.io/api/article/get_article_search_result`;

    const response = await fetch(apiUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        tag: tag,
      }),
    });

    const responseData = await response.json();

    if (response.status === 500) {
      return { internalServerError: { message: responseData.message } };
    }

    return await responseData;
  } catch (error) {
    return { internalServerError: { message: 'APIリクエスト中にエラーが発生しました。' } };
  }
}
