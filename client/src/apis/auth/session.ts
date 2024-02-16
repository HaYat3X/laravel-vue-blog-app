/**
 * ログインしているか判断するAPIにリクエストを送信します
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function isLogin() {
  try {
    const apiUrl = `https://rapid-tsukumi-6067.lolipop.io/api/session/is_login`

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
  } catch (error) {
    return { internalServerError: { message: 'APIリクエスト中にエラーが発生しました。' } }
  }
}

/**
 * ログイン処理をするAPIにリクエストを送信します
 * @param {string} email
 * @param {string} password
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function signIn(email: string, password: string) {
  try {
    const apiUrl = `https://rapid-tsukumi-6067.lolipop.io/api/session/sign_in`

    const response = await fetch(apiUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        email: email,
        password: password
      })
    })

    const responseData = await response.json()

    if (response.status === 500) {
      return { internalServerError: { message: responseData.message } }
    }

    return await responseData
  } catch (error) {
    return { internalServerError: { message: 'APIリクエスト中にエラーが発生しました。' } }
  }
}

/**
 * ログアウト処理をするAPIにリクエストを送信します
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function signOut() {
  try {
    const apiUrl = `https://rapid-tsukumi-6067.lolipop.io/api/session/sign_out`

    const response = await fetch(apiUrl, {
      method: 'DELETE',
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
  } catch (error) {
    return { internalServerError: { message: 'APIリクエスト中にエラーが発生しました。' } }
  }
}
