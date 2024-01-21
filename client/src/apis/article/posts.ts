/**
 * 公開記事一覧を取得するためのAPIにリクエストを送信します
 * @param {number} page - 取得するページ番号
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function getPublishedArticle(page: number) {
  try {
    const apiUrl = `http://127.0.0.1:8000/api/article/get_published_article?page=${page}`

    const response = await fetch(apiUrl, {
      headers: {
        'Content-Type': 'application/json'
      }
    })

    if (!response.ok) {
      return { error: { message: `APIリクエストが失敗しました。 ${response}` } }
    }

    return await response.json()
  } catch (error) {
    return { error: { message: 'APIリクエスト中にエラーが発生しました。' } }
  }
}

/**
 * 公開記事一覧を取得するためのAPIにリクエストを送信します
 * @param {any} slug - 取得するページ番号
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function getArticle(slug: any) {
  try {
    const apiUrl = `http://127.0.0.1:8000/api/article/get_article/${slug}`

    const response = await fetch(apiUrl, {
      headers: {
        'Content-Type': 'application/json'
      }
    })

    const responseData = await response.json()

    if (response.status === 500) {
      return { internalServerError: { message: responseData.message } }
    }

    if (response.status === 404) {
      return { notFoundError: { message: responseData.message } }
    }

    return await responseData
  } catch (error) {
    return { internalServerError: { message: 'APIリクエスト中にエラーが発生しました。' } }
  }
}

/**
 * 投稿記事一覧を取得するためのAPIにリクエストを送信します
 * @param {number} page - 取得するページ番号
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function getAllArticle(page: number) {
  const apiUrl = `http://127.0.0.1:8000/api/article/get_all_article?page=${page}`

  const response = await fetch(apiUrl, {
    headers: {
      'Content-Type': 'application/json',
      Authorization: `Bearer ${localStorage.getItem('authToken')}`
    }
  })

  const responseData = await response.json()

  if (response.status === 500) {
    return { internalServerError: { message: responseData.message } }
  }

  return await responseData
}

/**
 * 投稿記事一覧を取得するためのAPIにリクエストを送信します
 * @param {number} articleId - 削除する記事ID
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function removeArticle(articleId: number) {
  const apiUrl = `http://127.0.0.1:8000/api/article/remove_article/${articleId}`

  const response = await fetch(apiUrl, {
    method: 'DELETE',
    headers: {
      Authorization: `Bearer ${localStorage.getItem('authToken')}`
    }
  })

  const responseData = await response.json()

  if (response.status === 500) {
    return { internalServerError: { message: responseData.message } }
  }

  return await responseData
}