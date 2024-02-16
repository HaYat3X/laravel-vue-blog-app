/**
 * お問い合わせ一覧を取得するためのAPIにリクエストを送信します
 * @param {number} page - 取得するページ番号
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function getAllContact(page: number) {

  const apiUrl = `https://rapid-tsukumi-6067.lolipop.io/api/contact/get_all_contact?page=${page}`

  const response = await fetch(apiUrl, {
    headers: {
      'Content-Type': 'application/json',
      Authorization: `Bearer ${localStorage.getItem('authToken')}`
    }
  })

  const responseData = await response.json();

  if (response.status === 500) {
    return { internalServerError: { message: responseData.message } }
  }

  return responseData;
}

/**
 * お問い合わせを削除するためのAPIにリクエストを送信します
 * @param {number} contactId - 削除するお問い合わせID
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function removeContact(contactId: number) {
  const apiUrl = `https://rapid-tsukumi-6067.lolipop.io/api/contact/remove_contact/${contactId}`

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

/**
 * お問い合わせを保存するためのAPIにリクエストを送信します
 * @param {string} name 送信する名前
 * @param {string} email 送信するメールアドレス
 * @param {string} category 送信するカテゴリー
 * @param {string} content 送信するお問い合わせ内容
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function submitContact(name: string, email: string, category: string, content: string) {
  try {
    const apiUrl = `https://rapid-tsukumi-6067.lolipop.io/api/contact/submit_contact`;

    const response = await fetch(apiUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        name: name,
        email: email,
        category: category,
        content: content,
      }),
    });

    const responseData = await response.json();

    if (response.status === 500) {
      return { internalServerError: { message: responseData.message } };
    }

    if (response.status === 409) {
      return { ConflictError: { message: responseData.message } };
    }

    return await responseData;
  } catch (error) {
    return { internalServerError: { message: 'APIリクエスト中にエラーが発生しました。' } };
  }
}
